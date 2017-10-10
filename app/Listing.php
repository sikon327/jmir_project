<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class listing extends Model
{
    protected $fillable = ['name', 'province', 'telephone', 'postcode', 'salary'];

    protected $dates = ['deleted_at'];
}
