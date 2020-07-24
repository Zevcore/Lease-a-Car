<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public function Brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function packages() {
        return $this->hasMany(Package::class, 'model_id');
    }
}
