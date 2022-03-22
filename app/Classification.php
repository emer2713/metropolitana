<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classification extends Model
{

    protected $tables = 'classifications';
    protected $hidden = ['create_at', 'updated_at'];



    public function getSubclassifications()
    {
        return $this->hasMany(Subclassification::class, 'classification_id', 'id');
    }
    public function getSubareas()
    {
        return $this->hasMany(Subarea::class, 'classification_id', 'id');
    }
}
