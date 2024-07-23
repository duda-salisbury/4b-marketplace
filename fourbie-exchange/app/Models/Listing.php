<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Listing extends Model
{
    use HasFactory;

    /**
     * Default Attributes
     */
    protected $attributes = [
        'status' => 'draft',
        'type' => 'listing',
    ];

    /**
     * Fillable Attributes
     * Mass Assignment Protection, required to use methods like ->fill() with an already validated request.
     * Keep in mind - this means we should always mass assign properties to this model via a validated request.
     */
    protected $guarded = [];

    public function casts() {
        return [
            'year' => 'integer',
            'price' => 'integer',
            'odometer' => 'integer'
        ];
    }

    /**
     * Database Relationship Methods
     */
    public function make()
    {
        return $this->belongsTo(VehicleMake::class, 'vehicle_make_id');
    }

    public function model()
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function types() {
        return $this->belongsToMany(VehicleType::class);
    }

    public function image()
    {
        return $this->belongsTo(Upload::class, 'image_id');
    }

    public function listing_images() {
        return $this->hasMany(ListingImage::class, 'listing_id');
    }

    public function images() {
        return $this->hasManyThrough(Upload::class, ListingImage::class, 'listing_id', 'id', 'id', 'image_id');
    }


    public function carfax() {
        return $this->belongsTo(Upload::class, 'carfax_id');
    }

    public function dealer() {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }


    /**
     * Property Helpers
     */
    public function generateTitle() {
        $title = $this->model_year . ' ' . $this->make->name;
        if ( $this->model ) {
            $title .= ' ' . $this->model->name;
        }
        return $title;
    }
    
    public function generateSlug() {
        $slug = Str::slug($this->title);
        if ( Listing::where('slug', $slug)->exists() ) {
            $slug = $slug . '-' . Str::random(5);
        }
        return $slug;
    }

    public function generateExcerpt() {
        return substr($this->content, 0, 100);
    }

    public function afterInitialize() {
        $this->title = $this->generateTitle();
        $this->slug = $this->generateSlug();
        // $this->excerpt = $this->generateExcerpt();
    }

    /**
     * Query Scopes
     */
    public function scopePublished($query) {
        return $query->where('status', 'publish');
    }

    public function scopeDraft($query) {
        return $query->where('status', 'draft');
    }


    /**
     * Model Events
     */
    public static function booted() : void {
        // Right before it get's saved, lets generate a title, slug, and excerpt that can be edited later.
        static::creating(function (Listing $listing) {
            $listing->afterInitialize();
        });
    }
}
