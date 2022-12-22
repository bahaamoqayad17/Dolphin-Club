<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialsRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('dashboard.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.testimonials.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialsRequest $request)
    {
        $testimonial = Testimonial::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );
        if ($request->file('image')) {
            $image = rand().time().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image);
            $testimonial->update([
                'image' => $image,
            ]);
        }

        return redirect()->route('dashboard.testimonials.index')->with('msg', 'Testimonial Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.testimonials.update', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (file_exists(public_path('uploads/'.$testimonial->image))) {
            File::delete(public_path('uploads/'.$testimonial->image));
        }
        $testimonial->delete();

        return redirect()->route('dashboard.testimonials.index')->with('msg', 'Testimonial Deleted Successfully')->with('type', 'error');
    }
}
