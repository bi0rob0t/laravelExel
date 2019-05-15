<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelFile extends Model
{
    protected $fillable = [ 
        'daterow', 'courserow', 'grouprow','namerow','lectures' 
        ]; 
}
