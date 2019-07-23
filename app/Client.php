<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $fillable =[
      'name','address','phone_no','type'
    ];

    public function cases_(){
    	return $this->belongsToMany('\App\C_Case');
    }

    protected $primaryKey = 'Client_id';
}
