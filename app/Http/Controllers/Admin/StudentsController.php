<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(AddStudentRequest $request)
    {
        Student::create($request->all());

        return redirect()->back()->with('success', 'Added successfully!');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return redirect()->route('admin.students.index')->with('success', 'Updated successfully');
    }

    public function toggleBlock(Request $request)
    {
        $student = Student::find($request->get('student'));

        if ($student) {
            $student->blocked = !$student->blocked;
            $student->save();
        }
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}