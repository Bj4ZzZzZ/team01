<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dormitory extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "housemaster",
        "contact",
        "created_at",
        "updataed_at",
    ];
    
    public function beds(){
        return $this->hasMany("App\Models\Bed","did");
    }

    

    public function delete(){
        // dd($this->bed());
        $this->beds()->delete();
        // DB::table('sbrecords')->where('bid', $this->id)->delete();
        return parent::delete();
    }
}
