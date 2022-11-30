<?php

namespace App\Http\Controllers;

use App\Models\Rollcall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RollcallsController extends Controller
{
    //
    public function index(){
        $rollcalls = Rollcall::all();
        return view("rollcalls.index",["rollcalls"=>$rollcalls]);
    }

    public function show($id){
        $rollcall = Rollcall::findOrFail($id);
        return view("rollcalls.show",["rollcall"=>$rollcall]);
    }

    public function destroy($id){
        $rollcall = Rollcall::findOrFail($id);
        $rollcall->delete();
        return redirect("rollcalls");
    }
    public function create(){
        $sbrecords = DB::table('sbrecords')
            ->select('sbrecords.id', 'sbrecords.sid','sbrecords.bid')
            ->orderBy('sbrecords.id', 'asc')
            ->get();
    
        $data = [];
        foreach ($sbrecords as $sbrecord)
        {
            $data[$sbrecord->id] = $sbrecord->id;
        }
        return view("rollcalls.create",['sbrecords'=>$data]);
    }
}
