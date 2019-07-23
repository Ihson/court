<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class C_case extends Model
{
      protected $fillable =[
       'Case_type','Court_id','Case_id','tehsil', 'is_active'
    ];

    public function Court(){
       return $this->belongTo('\App\Court');
    }
    public function clients(){
       return $this->belongsToMany('\App\Client');
    }

    public function lawyer(){
       return $this->belongsToMany('\App\Lawyer');
    }

    public function partition_app(){
       return $this->hasMany('\App\partitio_app');
    }
/********* regular function changed to Regular*********/
    public function Regular(){
       return $this->hasMany('\App\regular');
    }

    public function prod_ejact(){
       return $this->hasMany('\App\prod_ejact');
    }

    protected $primaryKey = 'Case_id';
}
