<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
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
        if (request()->has('keyword')) {
            $courses = Course::where('name_' . App::getLocale(), 'like', '%' . request()->keyword . '%')->paginate(5);
        } else {
            $courses = Course::paginate(15);
        }

        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.courses.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        // dd($request->validated());
        $course = Course::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );
        if ($request->file('image')) {
            $image = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $image);
            $course->update([
                'image' => $image,
            ]);
        }

        return redirect()->route('dashboard.courses.index')->with('msg', 'Course Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('dashboard.courses.update', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        // dd($request->all());
        $course->update([
            'flag' => $request->flag,
        ]);

        return redirect()->route('dashboard.courses.index')->with('msg', 'Course Selected Successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (file_exists(public_path('uploads/' . $course->image))) {
            File::delete(public_path('uploads/' . $course->image));
        }
        $course->delete();

        return redirect()->route('dashboard.courses.index')->with('msg', 'Course Deleted Successfully')->with('type', 'error');
    }
}
