<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    public function index(){
        $features = Feature::all();
        return view("features.index",["features"=>$features]);
    }

    public function show($id){
        $feature = Feature::findOrFail($id);
        return view("features.show",["feature"=>$feature]);
    }

    public function destroy($id){
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect("features");
    }
    
    public function create(){
        $sbrecords = DB::table('sbrecords')
            ->select('sbrecords.id')
            ->orderBy('sbrecords.id', 'asc')
            ->get();
    
        $data = [];
        foreach ($sbrecords as $sbrecord)
        {
            $data[$sbrecord->id] = $sbrecord->id;
        }
        return view("features.create",['sbrecords'=>$data]);
    }

    public function store(){
        $input = Request::all();
        Feature::create($input);
        return redirect("features");
    }
}