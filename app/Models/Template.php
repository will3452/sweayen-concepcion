<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function public_path($path){
        $arr_path = explode('/', $path);
        $end_path  = end($arr_path);
        $folder_path = $arr_path[1];
        return '/storage/'.$folder_path.'/'.$end_path;
    }
}
