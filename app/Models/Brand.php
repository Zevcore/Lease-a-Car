<?php

namespace App\Models;

use App\Models\CarModel;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function carModels() {
        return $this->hasMany(CarModel::class, 'brand_id');
    }
}
