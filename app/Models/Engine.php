<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    public function packages() {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }
    public function components() {
        return $this->belongsToMany(Component::class, 'engine_component', 'engine_id', 'component_id');
    }
}
