<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'idnumber',
        'date',
        'user_id'
      ];

      public function user_profile(){
        return $this->hasOne(User::class);
      }
}
