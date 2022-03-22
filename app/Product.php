<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    protected $tables = 'products';
    protected $hidden = ['create_at', 'updated_at'];

    public function getClassification()
    {
        return $this->hasOne(Classification::class, 'id', 'classification_id');
    }
    public function getSubclassification()
    {
        return $this->hasOne(Subclassification::class, 'id', 'subclassification_id');
    }
    public function getTypes()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

}
