<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMobile extends Model
{
    protected $tables = 'c_mobiles';
    protected $hidden = ['create_at', 'updated_at'];

}
