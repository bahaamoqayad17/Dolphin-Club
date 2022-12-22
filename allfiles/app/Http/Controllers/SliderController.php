<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is_admin', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $slider = Slider::updateOrCreate(
            ['id' => $request->id],
            $request->validated()

        );
        if ($request->file('image')) {
            $image = time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('uploads'), $image);
            $slider->update([
                'image' => $image,
            ]);
        }

        return redirect()->route('dashboard.sliders.index')->with('msg', 'Slider Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.update', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if (file_exists(public_path('uploads/' . $slider->image))) {
            File::delete(public_path('uploads/' . $slider->image));
        }
        $slider->delete();

        return redirect()->route('dashboard.sliders.index')->with('msg', 'Slider Deleted Successfully')->with('type', 'error');
    }
}
