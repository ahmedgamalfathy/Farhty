<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //name ,description, original_price, offer_price, duration
        return [
            "name"=>fake()->unique()->word(),
            "description"=>json_encode(['افضل العروض  وافضل الباقات']) ,
            "original_price"=>fake()->randomElement([50.00,20.00]),
            "offer_price"=>fake()->randomElement([50.00,20.00,00]),
            "duration"=>fake()->numberBetween([1,9])
        ];
    }
}
