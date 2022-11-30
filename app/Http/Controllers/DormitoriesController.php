<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use App\Models\Dormitory;
class DormitoriesController extends Controller
{
    //
    public function index(){
        $dormitories = Dormitory::all();
        return view("dormitories.index",["dormitories"=>$dormitories]);
    }

    public function show($id){
        $dormitory = Dormitory::findOrFail($id);
        $beds = $dormitory->beds;
        return view("dormitories.show",["dormitory"=>$dormitory,"beds"=>$beds]);
    }

    public function destroy($id){
        $dormitory = Dormitory::findOrFail($id);
        $dormitory->delete();
        return redirect("dormitories");
    }
    public function create(){
        return view("dormitories.create");
    }
    public function store(){
        $input = Request::all();
        Dormitory::create($input);
        return redirect("dormitories");
    }
}
