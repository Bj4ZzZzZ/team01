<?php

namespace App\Http\Controllers;

use App\Models\Late;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LatesController extends Controller
{
    //
    public function index(){
        $lates = Late::all();
        return view("lates.index",["lates"=>$lates]);
    }
    public function show($id){
        $late = Late::findOrFail($id);

        return view('lates.show', ['late' => $late]);
    }
    public function examine($id){
        $late = Late::findOrFail($id);

        return view('lates.examine', ['late' => $late]);
    }
    public function destroy($id){
        $late = Late::findOrFail($id);
        $late->delete();
        return redirect('lates');
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
        return view("lates.create",['sbrecords'=>$data]);
    }
}
