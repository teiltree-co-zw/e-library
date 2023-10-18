<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'user_id' => 'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        $class = DB::table('student_classes')->where('student_id', $student->id)->first();

        if ($class)
        {
            $grade = Grade::findOrFail($class->class_id);
        }else{
            $grade = null;
        }

        $grades = Grade::all();

        return view('students.show', compact('student', 'grade', 'grades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'user_id' => 'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function assign_grade(Request $request, Student $student)
    {
        $check = DB::table('student_classes')->where('student_id', $student->id)->first();

        if ($check)
        {
            DB::table('student_classes')
                ->where('student_id', $student->id)
                ->update([
                    'class_id' => $request->grade_id
                ]);
        }
        else{

            DB::table('student_classes')->insert([
                'class_id' => $request->grade_id,
                'student_id'=> $student->id
            ]);
        }

        $grade = Grade::findOrFail($request->grade_id);

        return back()->with('success', 'Student Enrolled to '.$grade->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
