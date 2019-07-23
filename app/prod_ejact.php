<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prod_ejact extends Model
{
    protected $fillable =[
      'step_no','order_sheet','details','hearing_date','case_title','step_title','Case_id','remarks'
    ];

    public function C_case(){
    	return $this->belongsTo('\App\C_case');
    }
    protected $primaryKey = 'Case_id';
}
