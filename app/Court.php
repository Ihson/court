<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable =[
      'name','judge_name'
    ];

    public function C_case(){
    	return $this->hasMany('\App\C_case');
    }

    protected $primaryKey = 'Court_id';
}
