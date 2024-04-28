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

    public function type() {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function image()
    {
        return $this->hasOne(Upload::class, 'image_id');
    }

    public function carfax() {
        return $this->hasOne(Upload::class, 'carfax_id');
    }


    /**
     * Property Helpers
     */
    public function generateTitle() {
        return $this->year . ' ' . $this->make->name . ' ' . $this->model->name;
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
        $this->excerpt = $this->generateExcerpt();
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
