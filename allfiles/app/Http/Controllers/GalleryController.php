<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
        $galleries = Gallery::all();

        return view('dashboard.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.galleries.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGalleryRequest $request)
    {
        $gallery = Gallery::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );
        if ($request->file('image')) {
            $image = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image);
            $gallery->update([
                'image' => $image,
            ]);
        }
        // dd($article);
        return redirect()->route('dashboard.galleries.index')->with('msg', 'Photo Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.galleries.update', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if (file_exists(public_path('uploads/' . $gallery->image))) {
            File::delete(public_path('uploads/' . $gallery->image));
        }
        $gallery->delete();

        return redirect()->route('dashboard.galleries.index')->with('msg', 'Photo Deleted Successfully')->with('type', 'error');
    }
}
