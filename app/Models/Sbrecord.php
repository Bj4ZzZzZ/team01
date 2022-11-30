<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sbrecord extends Model
{
    use HasFactory;

    protected $fillable=[
        "school_year",
        "semester",
        "sid",
        "bid",
        "floor_head",
        "responsible_floor",
        "created_at",
        "updataed_at",
    ];

    public function student(){
        return $this->belongsTo("App\Models\Student","sid","id");
    }
    public function bed(){
        return $this->belongsTo("App\Models\Bed","bid","id");
    }
    public function rollcalls(){
        return $this->hasMany("App\Models\\rollcall","sbid");
    }
    public function leaves(){
        return $this->hasMany("App\Models\leave","sbid");
    }
    public function lates(){
        return $this->hasMany("App\Models\late","sbid");
    }
    public function delete(){
        $this->rollcalls()->delete();
        $this->leaves()->delete();
        $this->lates()->delete();
        
        return parent::delete();
    }
}
