<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function casts() {
        return [
            'year' => 'integer',
            'price' => 'integer',
            'odometer' => 'integer'
        ];
    }

    public function make()
    {
        return $this->belongsTo(VehicleMake::class, 'vehicle_make_id');
    }

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function type() {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
