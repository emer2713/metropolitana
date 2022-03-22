<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;

class Beer extends Model
{

    public function foods()
    {
        return $this->belongsToMany(Food::class);
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
