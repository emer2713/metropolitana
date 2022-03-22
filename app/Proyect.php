<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyect extends Model
{
    protected $fillable = [
        'name', 'user_id', 'file', 'sku'
    ];
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $tables = 'carousels';
    protected $hidden = ['create_at', 'updated_at'];

}
