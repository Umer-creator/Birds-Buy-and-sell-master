<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /*$category_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($category_name);
        return [
            //
            'name' => $category_name,
            'slug' => $slug,
            'description' => $this->faker->text(500),
            'image' => 'uploads/category/1675540426.jpg',
        ];*/
        $categories = ['Parakeets', 'Cockatiels', 'Parrots', 'Lovebirds', 'Finches', 'Conures', 'Pigeons', 'Macaws', 'Canaries', 'Budgies', 'African Greys', 'Caiques'];
        $category_name = $this->faker->unique()->randomElement($categories);
        $slug = Str::slug($category_name);
        return [
            'name' => $category_name,
            'slug' => $slug,
            'description' => $this->faker->text(800),
            'image' => 'uploads/category/1675540426.jpg',
        ];
    }
}
