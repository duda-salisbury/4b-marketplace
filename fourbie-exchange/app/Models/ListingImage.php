<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    protected $fillable = ['listing_id', 'image_id'];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function image()
    {
        return $this->belongsTo(Upload::class, 'image_id');
    }
}
