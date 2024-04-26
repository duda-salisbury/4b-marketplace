<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{

    protected $fillable = ['name', 'slug'];

    public function models()
    {
        return $this->hasMany(Model::class);
    }
}
