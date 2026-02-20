<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = ["id", "name", "duration"];

    public function teacher(){
        return $this -> belongsTo(Teacher::class);
    }

    public function test(){
        return $this -> hasMany(Test::class);
    }
}
