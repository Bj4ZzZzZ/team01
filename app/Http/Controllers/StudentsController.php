<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Request;

class StudentsController extends Controller
{
    //
    public function index(){
        $students = Student::all();
        return view("students.index",["students"=>$students]);
    }
    
    public function show($id){
        $student = Student::findOrFail($id);

        return view('students.show', ['student' => $student]);
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect('students');
    }

    public function create(){
        return view("students.create");
    }

    public function store(){
        $input = Request::all();
        Student::create($input);
        return redirect("students");
    }
}
