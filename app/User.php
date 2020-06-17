<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['id'];
    protected $keyType = 'string';
    
    public $incrementing = false;
    public $timestamps = false;
}
