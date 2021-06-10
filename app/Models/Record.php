<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name.', '.$this->middle_name;
    }

    public function getAgeAttribute(){
        return Carbon::parse($this->birthdate)->age;
    }

    //helper
    public function dateFormat($string){
        return Carbon::parse($string)->format('m/d/y');
    }

    public static function GENDER(){
        $data['male'] = Self::where('gender', 'M')->count();
        $data['female'] = Self::where('gender', 'F')->count();

        return $data;
    }

    public static function FOURPEACE(){
        $data['yes'] =  Self::where('fourp_benificiary', 'Yes')->count();
        $data['no'] =  Self::where('fourp_benificiary', 'No')->count();

        return $data;
    }

    public static function PHILHEALTH(){
        $data['yes'] =  Self::where('philhealth_member', 'Yes')->count();
        $data['no'] =  Self::where('philhealth_member', 'No')->count();

        return $data;
    }

    public static function AGE(){
        $data = [];
        $distinc_age = [];

        foreach(Self::get() as $rec){
            if(in_array($rec->age, $distinc_age)){
                $data[$rec->age] ++;
            }else {
                array_push($distinc_age, $rec->age);
                $data[$rec->age] = 1;
            }
        }

        return $data;
    }

    public static function ECCDF1K_STAT(){
        $data = [];

        $data['eccdf1k'] = Self::has('eccdf1k')->count();
        $data['master'] = Self::doesntHave('eccdf1k')->count();
        return $data;
    }

    public function eccdf1k(){
        return $this->hasOne(Eccdf1k::class);
    }

    
}
