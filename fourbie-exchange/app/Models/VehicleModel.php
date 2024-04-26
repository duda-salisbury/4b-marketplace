<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{

    protected $fillable = ['name', 'slug', 'make_id'];

    public function make()
    {
        return $this->belongsTo(VehicleMake::class);
    }
}
