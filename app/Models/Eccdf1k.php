<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eccdf1k extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    //relation
    public function record(){
        return $this->belongsTo(Record::class);
    }
}
