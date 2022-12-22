<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = Pic::all();

        return view('dashboard.pics.index', compact('pics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pics.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pic = Pic::create([]);
        $image = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $image);
        $pic->updateOrCreate(
            ['id' => $request->id],
            ['image' => $image],
        );

        return redirect()->route('dashboard.pics.index')->with('msg', 'Picture Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pics  $pics
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pic $pic)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pics  $pics
     * @return \Illuminate\Http\Response
     */
    public function edit(Pic $pic)
    {
        return view('dashboard.pics.update', compact('pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pics  $pics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pic $pic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pics  $pics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        File::delete(public_path('uploads/' . $pic->image));
        $pic->delete();

        return redirect()->route('dashboard.pics.index')->with('msg', 'Picture Deleted Successfully')->with('type', 'error');
    }
}
