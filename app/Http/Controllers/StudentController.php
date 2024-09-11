<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function listStudent()
    {
        $allstudent = Student::all();
        return view('student.list', compact('allstudent'));
    }

    public function addStudent()
    {

        return view('student.add');
    }


    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'number' => 'required|numeric',
        ]);

        $store = new Student();
        $store->name = $request->name;
        $store->email = $request->email;
        $store->address = $request->address;
        $store->number = $request->number;
        $store->save();

        $redirectUrl = url('/');
        return response()->json(['status' => 'success', 'redirect' => $redirectUrl, 'message' => 'Student inserted successfully!']);
    }

    public function editStudent($id)
    {
        $editstudent = Student::find($id);
        return view('student.edit', compact('editstudent'));
    }
    public function updateStudent(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'number' => 'required|numeric',
        ]);
        $updatestudent = Student::find($request->id);
        $updatestudent->name = $request->name;
        $updatestudent->email = $request->email;
        $updatestudent->address = $request->address;
        $updatestudent->number = $request->number;
        $updatestudent->save();

        return response()->json(['status' => 'success', 'redirect' => url('/'), 'message' => 'Student updated successfully!']);
    }
    public function deleteStudent($id)
    {
        $deletestudent = Student::find($id);   
        $deletestudent->delete();
    
        return redirect()->back();
    }
}
