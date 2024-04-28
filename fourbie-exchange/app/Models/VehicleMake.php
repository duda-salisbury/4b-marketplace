<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{

    protected $fillable = ['name', 'slug'];

    public function models()
    {
        return $this->hasMany(VehicleModel::class, 'vehicle_make_id');
    }
}
