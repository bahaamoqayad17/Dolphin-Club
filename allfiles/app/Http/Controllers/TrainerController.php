<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainerRequest;
use App\Models\Trainer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is_admin', 'auth'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('keyword')) {
            $trainers = Trainer::where('name_' . App::getLocale(), 'like', '%' . request()->keyword . '%')->paginate(5);
        } else {
            $trainers = Trainer::paginate(15);
        }

        return view('dashboard.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.trainers.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        $trainer = Trainer::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );
        if ($request->file('image')) {
            $image = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image);
            $trainer->update([
                'image' => $image,
            ]);
        }

        return redirect()->route('dashboard.trainers.index')->with('msg', 'Trainer Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        $settings = Setting::all();
        $data = [];
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $trainers = Trainer::paginate(4);
        return view('site.trainer', compact('trainer', 'trainers', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('dashboard.trainers.update', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        return view('dashboard.trainers.update', compact('trainer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        if (file_exists(public_path('uploads/' . $trainer->image))) {
            File::delete(public_path('uploads/' . $trainer->image));
        }
        $trainer->delete();

        return redirect()->route('dashboard.trainers.index')->with('msg', 'Trainer Deleted Successfully')->with('type', 'error');
    }
}
