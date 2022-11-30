<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rollcall extends Model
{
    use HasFactory;

    public function sbrecord(){
        return $this->belongsTo("App\Models\Sbrecord","sbid","id");
    }

}
