<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapdemo extends Model
{
    protected $table=['places'];
    public $fillable = ['Places', 'latitude', 'longitude'];
}
