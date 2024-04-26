<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function casts() {
        return [
            'size' => 'integer'
        ];
    }
    
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
