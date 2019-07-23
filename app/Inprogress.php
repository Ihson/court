<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inprogress extends Model
{
    protected $fillable =
    [
      'title','step1','step2','step3','step4','step5'
    ];

    protected $primaryKey = 'Case_id';
}
