<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Session;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
         $professors = \App\Models\Professor::all(); // Fetch all professors
        return view('courses.edit', compact('course', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateCourseRequest $request, Course $course)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'string',
        'professor_id' => 'string|exists:professors,id',
    ]);

    $course->update($request->only(['name', 'description','professor_id']));

    return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
     public function trash($id)
    {
        Course::Destroy($id);
        Session::Flash('success', 'Course trashed successfully');
        return redirect() -> route('courses.index');
    }

    public function destroy($id)
    {
        $course = Course::withTrashed() -> where('id', $id) -> first();
        $course -> forceDelete();
        Session::Flash('success', 'Course deleted successfully');
        return redirect() -> route('courses.index');
    }

    public function restore($id)
    {
        $course = Course::withTrashed() -> where('id', $id) -> first();
        $course -> restore();
        Session::Flash('success', 'Course restored successfully');
        return redirect() -> route('courses.trashed');
    }

}
