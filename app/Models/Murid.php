<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{	

   protected $table = "murid";
   protected $guarded = ['verified'];
    
}