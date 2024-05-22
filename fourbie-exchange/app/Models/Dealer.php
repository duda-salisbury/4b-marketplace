<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dealer extends Model
{

    protected $fillable = ['email'];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function generateSlug() {
        $slug = Str::slug($this->title);
        if ( Dealer::where('slug', $slug)->exists() ) {
            $slug = $slug . '-' . Str::random(5);
        }
        return $slug;
    }

    /** optional has one User */
    public function user() {
        return $this->hasOne(User::class);
    }

    /**
     * Model Events
     */
    public static function booted() : void {
        // Right before it get's saved, lets generate a title, slug, and excerpt that can be edited later.
        static::creating(function (Dealer $dealer) {
            $dealer->slug = $dealer->generateSlug();
        });
    }
}
