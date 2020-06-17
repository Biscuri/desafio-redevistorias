<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';
    protected $keyType = 'string';
    
    public $incrementing = false;
    public $timestamps = false;
}
