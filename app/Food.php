<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $tables = 'foods';
    protected $hidden = ['create_at', 'updated_at'];


    public function getBeers()
    {
        return $this->belongsToMany(Beer::class);
    }

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
