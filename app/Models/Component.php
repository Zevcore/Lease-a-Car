<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public function engines() {
        return $this->belongsToMany(Component::class, 'engine_component', 'engine_id', 'component_id');
    }

    public $timestamps = false;
}
