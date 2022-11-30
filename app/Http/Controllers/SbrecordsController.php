<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Models\Sbrecord;
use Illuminate\Support\Facades\DB;

class SbrecordsController extends Controller
{
    //
    public function index(){
        $sbrecords = Sbrecord::all();
        return view("sbrecords.index",["sbrecords"=>$sbrecords]);
    }

    public function show($id){
        $sbrecord = Sbrecord::findOrFail($id);
        $rollcalls = $sbrecord->rollcalls;
        $leaves = $sbrecord->leaves;
        $lates = $sbrecord->lates;

        return view("sbrecords.show",["sbrecord"=>$sbrecord, "rollcalls"=>$rollcalls, "leaves"=>$leaves, "lates"=>$lates]);
    }

    public function destroy($id){
        $sbrecord = Sbrecord::findOrFail($id);
        $sbrecord->delete();
        return redirect("sbrecords");
    }
    public function create(){
        $students = DB::table('students')
            ->select('students.id', 'students.name')
            ->orderBy('students.id', 'asc')
            ->get();
        $beds = DB::table('beds')
            ->select('beds.id', 'beds.bedcode')
            ->orderBy('beds.id', 'asc')
            ->get();
    
        $data = [];
        $data1 = [];
        foreach ($students as $student)
        {
            $data[$student->id] = $student->name;
        }
        foreach ($beds as $bed)
        {
            $data1[$bed->id] = $bed->bedcode;
        }
        return view("sbrecords.create",["students"=>$data,"beds"=>$data1]);
    }
    
    public function store(){
        $input = Request::all();
        Sbrecord::create($input);
        return redirect("sbrecords");
    }
}
