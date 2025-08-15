<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.index',[
          'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $allCourses = Course::all(); // Pass courses for selection
        return view('students.create', compact('allCourses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
      $student= student::create($request -> validated());
       if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }
       return redirect() -> route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $student = Student::with('courses')->findOrFail($id);
    $allCourses = Course::all(); // to populate dropdown

    return view('students.show', compact('student', 'allCourses'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
       return view('students.edit', compact('student'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        Session::flash('success', 'Student updated successfully');
        return redirect()->route('students.index');
    }

    public function addCourse(StoreStudentRequest $request, $studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->attach($request->course_id);

        return redirect()->back()->with('success', 'Course added to student successfully.');
    }
    
    public function removeCourse($studentId, $courseId)
    {
        $student = Student::findOrFail($studentId);
        $student->courses()->detach($courseId);

        return redirect()->back()->with('success', 'Course removed from student.');
    }

    /**
     * Remove the specified resource from storage.
     */
         public function trash($id)
    {
        Student::Destroy($id);
        Session::Flash('success', 'Student trashed successfully');
        return redirect() -> route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::withTrashed() -> where('id', $id) -> first();
        $student -> forceDelete();
        Session::Flash('success', 'Student deleted successfully');
        return redirect() -> route('students.index');
    }

    public function restore($id)
    {
        $student = Student::withTrashed() -> where('id', $id) -> first();
        $student -> restore();
        Session::Flash('success', 'Student restored successfully');
        return redirect() -> route('students.trashed');
    }


}