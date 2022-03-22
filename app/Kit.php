<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kit extends Model
{
    protected $tables = 'kits';
    protected $hidden = ['create_at', 'updated_at'];





}
