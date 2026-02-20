<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $fillable = ["id", "name", "questions", "types"];

    public function subject(){
        return $this -> belongsTo(Subject::class);
    }
}
