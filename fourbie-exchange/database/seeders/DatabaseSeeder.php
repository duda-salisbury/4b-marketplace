<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        $vehicleTypes = [
            [
                'name' => 'American',
                'slug' => 'american'
            ],
            [
                'name' => 'European',
                'slug' => 'european'
            ],
            [
                'name' => 'Ex-Military & Service Vehicles',
                'slug' => 'military-service-vehicles'
            ],
            [
                'name' => 'Expedition Vehicles',
                'slug' => 'expedition-vehicles'
            ],
            [
                'name' => 'Imports',
                'slug' => 'imports'
            ],
            [
                'name' => 'Pickup Trucks',
                'slug' => 'trucks'
            ],
            [
                'name' => 'Projects',
                'slug' => 'projects'
            ],
            [
                'name' => 'SUVs',
                'slug' => 'SUVs'
            ],
            [
                'name' => 'Vans & Campers',
                'slug' => 'vans-campers'
            ]
        ];

        foreach($vehicleTypes as $type) {
            VehicleType::firstOrCreate([
                'name' => $type['name'],
                'slug' => $type['slug']
            ]);
        }

        $types = VehicleType::all();
        $listings = Listing::factory(100)->create()
            ->each(function($listing) use ($types) {
                $listing->types()->sync($types->random());
            });
    }
}
