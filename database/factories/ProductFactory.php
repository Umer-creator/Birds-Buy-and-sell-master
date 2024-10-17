<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //  $product_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $product_names = [
            'Budgerigar',
            'Cockatiel',
            'African Grey Parrot',
            'Lovebird',
            'Canary',
            'Macaw',
            'Pigeon',
            'Conure',
            'Amazon Parrot',
            'Eclectus Parrot',
            'Senegal Parrot',
            'Quaker Parrot',
            'Caique',
            'Rosella',
            'Lory',
            'Lorikeet',
            'Cockatoo',
            'Sun Conure',
            'Jenday Conure',
            'Green Cheeked Conure',
            'Red Rump Parrot',
            'Peach Faced Lovebird',
            'Fischer\'s Lovebird',
            'Indian Ringneck',
            'Alexandrine Parrot'
        ];
        $product_name = $this->faker->unique()->randomElement($product_names);
        //$slug = Str::slug($product_name);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_des' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'status' => 1,
            'image' => 'uploads/product/1676066658.jpg',
            'images' => '["uploads\/product\/Haunts_Slide.jpg1676066658.jpg","uploads\/product\/images (1).jpg1676066658.jpg","uploads\/product\/images.jpg1676066658.jpg"]',
            'price' => $this->faker->numberBetween(500, 5000),
            'quantity' => $this->faker->numberBetween(10, 50),
            'category_id' => $this->faker->numberBetween(1, 12),
            'store_id' => $this->faker->numberBetween(1, 12),
        ];
    }
}
