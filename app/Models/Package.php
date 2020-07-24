<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function carModels() {
        return $this->belongsTo(CarModel::class, 'model_id', 'id');
    }
    public function engines() {
        return $this->hasMany(Engine::class, 'package_id');
    }
}
