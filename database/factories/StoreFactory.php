<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $store_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $stores = [
            'Parrot Paradise',
            'Feathered Friends',
            'Bird Barn',
            'Wings and Whistles',
            'Avian Adventures',
            'Beak Street',
            'Perch Palace',
            'The Bird House',
            'Wing World',
            'Nest Nook',
            'Birdie Boutique',
            'Feathery Flock'
        ];
        $store_name = $this->faker->unique()->randomElement($stores);
        $slug = Str::slug($store_name);
        $address = $this->faker->address;
        $longitude = round($this->faker->longitude($min = 71.0, $max = 74.0), 7);
        $latitude = round($this->faker->latitude($min = 33.0, $max = 36.0), 10);

        return [
            //
            'name' => $store_name,
            'slug' => $slug,
            'address' => $address,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'seller_id' => $this->faker->unique->numberBetween(1, 12),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
