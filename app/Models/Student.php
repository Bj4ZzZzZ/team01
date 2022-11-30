<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        "number",
        "class",
        "name",
        "address",
        "phone",
        "nationality",
        "guardian",
        "salutation",
        "remark",
        "created_at",
        "updataed_at",
    ];

    public function sbrecords(){
        return $this->hasMany("App\Models\Sbrecord","sid");
    }

    public function delete(){
        $this->sbrecords()->delete();
        return parent::delete();
    }
}
