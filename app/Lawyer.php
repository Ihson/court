<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable =[
      'name','phone_no','type',
    ];

    public function case_l(){
    	return $this->belongsToMany('\App\C_case');
    }

}
