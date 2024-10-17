<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $categories = [
            [
                'id' => 21,
                'name' => 'Budgies',
                'description' => 'Budgies, also known as budgerigars, are small and colorful parakeets that are popular as pets. They are known for their playful and social nature, making them great companions for bird enthusiasts.',
                'popular' => 1,
                'image' => 'uploads/category/budgies.jpg',
            ],
            [
                'id' => 22,
                'name' => 'Canaries',
                'description' => 'Canaries are small songbirds known for their melodious tunes and vibrant plumage. They are often kept as pets for their beautiful singing abilities and can add a touch of music to any environment.',
                'popular' => 1,
                'image' => 'uploads/category/canaries.jpg',
            ],
            [
                'id' => 23,
                'name' => 'Ducks',
                'description' => 'Ducks are aquatic birds that are found in various habitats, including ponds, lakes, and rivers. They are well-adapted to swimming and diving, and their presence can bring a sense of tranquility to water bodies.',
                'popular' => 0,
                'image' => 'uploads/category/ducks.jpg',
            ],
            [
                'id' => 24,
                'name' => 'Finches',
                'description' => 'Finches are small passerine birds known for their colorful plumage and delightful songs. They are popular among bird enthusiasts for their cheerful melodies and can brighten up any aviary or garden.',
                'popular' => 1,
                'image' => 'uploads/category/finches.jpg',
            ],
            [
                'id' => 25,
                'name' => 'Hens',
                'description' => 'Hens are female domestic chickens often kept for their eggs and sometimes as pets. They are known for their clucking sounds and can provide a sustainable source of fresh eggs in a backyard setting.',
                'popular' => 0,
                'image' => 'uploads/category/hens.jpg',
            ],
            [
                'id' => 26,
                'name' => 'Lovebirds',
                'description' => 'Lovebirds are small parrots known for their affectionate behavior and strong bond with their mates. They are highly social birds that thrive on companionship and can form deep connections with their human caretakers.',
                'popular' => 1,
                'image' => 'uploads/category/lovebirds.jpg',
            ],
            [
                'id' => 27,
                'name' => 'Pheasants',
                'description' => 'Pheasants are colorful birds belonging to the Phasianidae family and are often sought after for their beauty. They exhibit elaborate plumage and are admired for their striking appearance, making them popular among bird enthusiasts.',
                'popular' => 0,
                'image' => 'uploads/category/pheasants.jpg',
            ],
            [
                'id' => 28,
                'name' => 'Pigeons',
                'description' => 'Pigeons are highly adaptable birds found in urban areas worldwide and have a long history of association with humans. They are known for their homing abilities and have been used as messengers and pets for centuries.',
                'popular' => 1,
                'image' => 'uploads/category/pigeons.jpg',
            ],
            [
                'id' => 29,
                'name' => 'Parrots',
                'description' => 'Parrots are intelligent and colorful birds known for their ability to mimic sounds and human speech. They are prized as pets for their interactive nature, ability to learn tricks, and their vibrant feathers.',
                'popular' => 1,
                'image' => 'uploads/category/parrots.jpg',
            ],
            [
                'id' => 30,
                'name' => 'Seabirds',
                'description' => 'Seabirds are birds that inhabit coastal areas and rely on the ocean for their food. They include various species such as seagulls, pelicans, cormorants, and albatrosses. These birds have adapted to marine life and have unique characteristics to thrive in coastal environments.',
                'popular' => 1,
                'image' => 'uploads/category/seabirds.jpg',

            ],
        ];


        foreach ($categories as $categoryData) {
            Category::create([
                'id' => $categoryData['id'],
                'name' => $categoryData['name'],
                'slug' => Str::slug($categoryData['name']),
                'description' => $categoryData['description'],
                'image' => $categoryData['image'],
                'popular' => $categoryData['popular'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
