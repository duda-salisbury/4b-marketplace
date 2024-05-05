<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public function listings() {
        return $this->belongsToMany(Listing::class);
    }
}
