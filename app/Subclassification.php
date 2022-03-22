<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Subarea;
use App\Classification;

class Subclassification extends Model
{

    protected $tables = 'subclassifications';
    protected $hidden = ['create_at', 'updated_at'];

    public function classification()
    {
        return $this->hasOne(Classification::class, 'id', 'classification_id');
    }



}
