<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regular extends Model
{
    //
    protected $fillable =[
      'Case_id','details','hearing_date','order_sheet','case_title','step_title','step_no','remarks'
    ];

    public function case_r(){
    	return $this->belongsTo('\App\C_case');
    }

    protected $primaryKey = 'Case_id' ;
}
