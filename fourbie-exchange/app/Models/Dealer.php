<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
