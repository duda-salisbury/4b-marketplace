<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create Makes
        Schema::create('vehicle_makes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Create Models
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_make_id')->constrained()->onDelete('cascade');
            $table->string('name')->index();
            $table->string('slug');
            $table->timestamps();
        });

        // Create Uploads
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('path')->nullable();
            $table->integer('size')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_name')->nullable();
            $table->string('url');
            $table->timestamps();
        });

        // Create Vehicle Types
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Create Syndication Sources
        Schema::create('syndication_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->timestamps();
        });
        // Create Dealers
        Schema::create('dealers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->timestamps();
        });

        // Create Listings
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->string('slug')->unique();
            $table->string('status')->default('draft');
            $table->longText('content')->nullable();
            $table->longText('about')->nullable();
            $table->longText('features')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('type')->default('listing');
            $table->text('external_url')->nullable();
            $table->foreignId('vehicle_make_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('vehicle_model_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('dealer_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('syndication_source_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('image_id')->nullable()->constrained('uploads')->onDelete('set null');
            $table->string('carfax_id')->nullable()->constrained('uploads')->onDelete('set null');
            $table->foreignId('seller_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('price')->nullable();
            $table->integer('odometer')->nullable();
            $table->string('model_year');
            $table->string('color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('engine')->nullable();
            $table->string('drivetrain')->nullable();
            $table->string('body_style')->nullable();
            $table->string('title_status')->nullable();
            $table->string('vin')->nullable();
            $table->timestamps();
        });

        Schema::create('listing_vehicle_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_type_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Create Listing Images
        Schema::create('listing_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->foreignId('image_id')->constrained('uploads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::dropIfExists('listing_images');
        Schema::dropIfExists('listing_vehicle_types'); 
        Schema::dropIfExists('listings');
        Schema::dropIfExists('dealers');
        Schema::dropIfExists('syndication_sources');
        Schema::dropIfExists('vehicle_types');
        Schema::dropIfExists('images');
        Schema::dropIfExists('vehicle_models');
        Schema::dropIfExists('vehicle_makes');
    }
};
