<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=["nama","usia","jenis_kelamin"];
}
