<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filmography extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $tables = 'filmographies';
    protected $hidden = ['create_at', 'updated_at'];

    public function year()
    {
        return $this->hasOne(Year::class, 'id', 'year_id');
    }


}
