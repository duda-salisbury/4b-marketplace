<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function casts() {
        return [
            'size' => 'integer'
        ];
    }
    
    public function imageFor()
    {
        return $this->belongsTo(Listing::class, 'image_id');
    }

    public function carfaxFor()
    {
        return $this->belongsTo(Listing::class, 'carfax_id');
    }
}
