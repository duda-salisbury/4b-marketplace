<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\FakeCar;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new FakeCar($this->faker));
        $vehicle = $this->faker->vehicleArray();

        $year = $this->faker->biasedNumberBetween(1940, date('Y'), 'sqrt');
        $title = $year . ' ' . $vehicle['brand'] . ' ' . $vehicle['model'];
        $content = $this->faker->paragraphs(3, true);
        
        $make = VehicleMake::firstOrCreate([
            'name' => $vehicle['brand'],
            'slug' => Str::slug($vehicle['brand'])
        ]);

        $model = VehicleModel::firstOrCreate([
            'name' => $vehicle['model'],
            'slug' => Str::slug($vehicle['model']),
            'vehicle_make_id' => $make->id
        ]);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => fake()->randomElement(['draft', 'publish']),
            'content' => $content,
            'excerpt' => substr($content, 0, 100),
            'type' => 'listing',
            'city' => fake()->city(),
            'state' => fake()->state(),
            'price' => fake()->numberBetween(1000, 100000),
            'odometer' => fake()->numberBetween(0, 200000),
            'model_year' => $year,
            'color' => fake()->colorName(),
            'transmission' => fake()->randomElement(['automatic', 'manual']),
            'fuel_type' => fake()->randomElement(['gasoline', 'diesel', 'electric', 'hybrid']),
            'engine' => fake()->randomElement(['v6', 'v8', 'v12']),
            'drivetrain' => fake()->randomElement(['awd', '4x4', '4x2']),
            'body_style' => fake()->randomElement(['sedan', 'coupe', 'suv', 'truck', 'van']),
            'title_status' => fake()->randomElement(['clean', 'salvage', 'rebuilt']),
            'vin' => fake()->regexify('[A-Z0-9]{17}'),
            'vehicle_make_id' => $make->id,
            'vehicle_model_id' => $model->id
        ];
    }
}
