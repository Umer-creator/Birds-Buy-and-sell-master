<?php

namespace Database\Seeders;

use App\Models\Product;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

use function Ramsey\Uuid\v1;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ["name" => "Blue Budgie", "short_des" => "Playful and vibrant blue Budgie, a delightful and intelligent companion bird.", "description" => "The Blue Budgie is a striking Budgie variant with vibrant blue plumage. Known for their playful and social nature, Blue Budgies make delightful companions. They are intelligent and can learn to mimic human speech and sounds. Blue Budgies thrive in spacious cages with plenty of toys and social interaction. Enjoy the company of this beautiful and charming avian friend.", "image" => "uploads\/product\/1688489444.jpg", "images" => "[\"uploads\\\/product\\\/BlueBudgie1.jpg1688489444.jpg\",\"uploads\\\/product\\\/BlueBudgie2.jpg1688489444.jpg\",\"uploads\\\/product\\\/BlueBudgie3.png1688489444.png\"]", "category_id" => 21],

            ["name" => "White Budgie=>", "short_des" => "Elegant white-colored Budgie", "description" => "The White Budgie is an elegant and graceful Budgie variant with pristine white plumage. Known for their peaceful demeanor, White Budgies make wonderful pets. They are sociable birds that enjoy interacting with their owners and other Budgies. With their gentle nature and beautiful appearance, White Budgies add a touch of serenity to any aviary or home environment.", "image" => "uploads\/product\/1688489574.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688489574.jpg\",\"uploads\\\/product\\\/2.jpg1688489574.jpg\",\"uploads\\\/product\\\/3.jpg1688489574.jpg\"]", "category_id" => 21],

            ["name" => "Lutino Budgie", "short_des" => "The Lutino Budgie is a visually striking Budgie variant with vibrant yellow plumage.", "description" => "Lutino budgies are a type of budgie that is completely yellow. They have yellow bodies, eyes, and beaks. They are more expensive than blue or white budgies, with prices starting at around Rs. 1,000 per bird.", "image" => "uploads\/product\/1688489702.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688489702.jpg\",\"uploads\\\/product\\\/2.jpg1688489702.jpg\"]", "category_id" => 21],

            ["name" => "Yellow Canary", "short_des" => "\"Beautiful Yellow Crested Cockatoo for sale! This charismatic bird features a vibrant yellow crest and playful personality", "description" => "\"Our Yellow Crested Cockatoo is a stunning avian beauty that will captivate you with its brilliant yellow crest and inquisitive nature. This intelligent and social bird loves to interact with its human companions, displaying its playful and entertaining behaviors. With its charming personality and stunning appearance, this Yellow Crested Cockatoo is an ideal addition to any bird-loving household. Hand-raised and well-socialized, this exceptional bird is ready to bring joy and companionship to its new forever home.\"", "image" => "uploads\/product\/1688490251.jpg", "images" => null, "category_id" => 22],

            ["name" => "Fallow Canary", "short_des" => "\"Adorable Fallow Canary available for sale! This charming bird showcases beautiful muted colors and a sweet singing voice. A perfect choice for bird enthusiasts looking for a melodious companion.\"", "description" => "Our Fallow Canary is a delightful avian friend that will mesmerize you with its gentle beauty and melodious songs. With its soft and muted plumage colors, this Fallow Canary stands out from the crowd. Its soothing singing voice adds a serene ambiance to any space. Known for their calm temperament and friendly disposition, Fallow Canaries make wonderful companions for bird lovers of all ages. This hand-raised and well-cared-for Fallow Canary is ready to bring joy and tranquility to its new forever hom", "image" => "uploads\/product\/1688490354.jpg", "images" => "[\"uploads\\\/product\\\/2.jpg1688490354.jpg\",\"uploads\\\/product\\\/3.jpg1688490354.jpg\"]", "category_id" => 21],

            ["name" => "Black-headed Canary", "short_des" => "Stunning Black-headed Canary available for sale! This exquisite bird features a black head and vibrant yellow body. A perfect choice for bird enthusiasts seeking a striking and melodious companion", "description" => "Our Black-headed Canary is a truly captivating avian beauty. With its striking black head contrasting against its vibrant yellow body, this bird is a sight to behold. Not only is it visually stunning, but it also possesses a delightful singing voice. The melodious songs of the Black-headed Canary will fill your space with joy and harmony. Known for their charming and social nature, these canaries make delightful companions. This well-cared-for Black-headed Canary is ready to find its forever home and bring beauty and melodious tunes to its new owner", "image" => "uploads\/product\/1688490498.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688490498.jpg\",\"uploads\\\/product\\\/2.jpg1688490498.jpg\"]", "category_id" => 22],

            ["name" => "Muscovy Duck", "short_des" => "Adorable Muscovy Duck available for sale! This charming bird is known for its unique appearance and friendly nature.", "description" => "Our Muscovy Duck is a delightful addition to any flock or pond. With its unique appearance, including a distinctive red caruncle on the face and striking feather patterns, this duck is sure to catch the attention of bird enthusiasts. Muscovy Ducks are known for their calm and friendly nature, making them a joy to interact with.", "image" => "uploads\/product\/1688490665.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688490665.jpg\",\"uploads\\\/product\\\/2.jpg1688490665.jpg\",\"uploads\\\/product\\\/3.jpg1688490665.jpg\"]", "category_id" => 23],

            ["name" => "Adorable Runner Duck", "short_des" => "Adorable Runner Duck available for sale! This fascinating bird is known for its upright posture and excellent foraging abilities", "description" => "Our Runner Duck is a captivating addition to any flock or farmyard. With its distinctive upright posture and slender body, this duck stands out from the crowd. Runner Ducks are renowned for their excellent foraging abilities, making them great pest controllers in gardens or farms. They are highly active and have an entertaining waddle, bringing life and energy to their surroundings", "image" => "uploads\/product\/1688490762.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688490762.jpg\",\"uploads\\\/product\\\/2.jpg1688490762.jpg\"]", "category_id" => 23],

            ["name" => "Blue Finch", "short_des" => "Beautiful Blue Finch available for sale! This charming bird showcases stunning blue plumage and delightful singing abilities.", "description" => "Our Blue Finch is a true delight for bird lovers. With its striking blue plumage and petite size, this bird adds a touch of vibrant color to any aviary or home. Not only is it visually captivating, but it also possesses a sweet and melodious singing voice. The soothing songs of the Blue Finch create a tranquil ambiance", "image" => "uploads\/product\/1688490891.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688490891.jpg\",\"uploads\\\/product\\\/2.jpg1688490891.jpg\",\"uploads\\\/product\\\/3.jpg1688490892.jpg\"]", "category_id" => 24],

            ["name" => "American Goldfinch", "short_des" => "Captivating American Goldfinch available for sale! This beautiful bird features vibrant yellow plumage and delightful song. A perfect choice for bird enthusiasts seeking a visually stunning and melodious companion.", "description" => "Our American Goldfinch is a true gem among songbirds. With its vibrant yellow plumage and contrasting black wings, this bird is a sight to behold. Not only is it visually stunning, but it also possesses a sweet and melodious song that adds a cheerful note to any environment. Known for their acrobatic flight and playful nature, American Goldfinches bring joy and entertainment to bird lovers.", "image" => "uploads\/product\/1688491012.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491012.jpg\",\"uploads\\\/product\\\/2.jpg1688491012.jpg\",\"uploads\\\/product\\\/3.jpg1688491012.jpg\"]", "category_id" => 24],

            ["name" => "Leghorn", "short_des" => "Classic Leghorn available for sale! This popular breed is known for its excellent egg-laying abilities and elegant appearance.", "description" => "\"Our Leghorn chickens are a sought-after breed for their exceptional egg-laying capabilities. With their elegant and slim build, these birds are a true delight to behold. Leghorns are known for their prolific egg production, making them a favorite among poultry keepers. They are also known for their alert and active nature,", "image" => "uploads\/product\/1688491097.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491097.jpg\"]", "category_id" => 25],

            ["name" => "Leghorn bird", "short_des" => "Australorp hens are known for their black feathers and their ability to lay a lot of eggs.", "description" => "Australorp hens are known for their black feathers and their ability to lay a lot of eggs. They are relatively inexpensive, with prices starting at around Rs. 600 per bird.for their black feathers and their ability to lay a lot of eggs.", "image" => "uploads\/product\/1688491185.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491185.jpg\",\"uploads\\\/product\\\/2.jpg1688491185.jpg\",\"uploads\\\/product\\\/3.jpg1688491185.jpg\"]", "category_id" => 25],

            ["name" => "Fischer's Lovebird", "short_des" => "Fischer's lovebirds are one of the most popular breeds of lovebirds.", "description" => "Fischer's lovebirds are one of the most popular breeds of lovebirds. They are known for their bright green plumage and their playful personalities. They are relatively inexpensive, with prices starting at around Rs. 500 per bird.", "image" => "uploads\/product\/1688491304.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491304.jpg\",\"uploads\\\/product\\\/2.jpg1688491304.jpg\",\"uploads\\\/product\\\/3.jpg1688491304.jpg\"]", "category_id" => 26],

            ["name" => "Fischer's lovebirds", "short_des" => "for their bright green plumage with neon blue wingtips.", "description" => "Neon-winged lovebirds are known for their bright green plumage with neon blue wingtips. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.for their bright green plumage with neon blue wingtips.", "image" => "uploads\/product\/1688491392.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491392.jpg\",\"uploads\\\/product\\\/2.jpg1688491392.jpg\",\"uploads\\\/product\\\/3.jpg1688491392.jpg\"]", "category_id" => 26],

            ["name" => "Crested pheasant", "short_des" => "pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and i", "description" => "The crested pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and its distinctive crest. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 8,000 per bird.pheasant is a colorful pheasant native to China. It is known for its bright green plumage, its long tail feathers, and i", "image" => "uploads\/product\/1688491489.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491489.jpg\"]", "category_id" => 27],

            ["name" => "Spotted pigeon", "short_des" => "They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.", "description" => "The spotted pigeon is a pigeon found in Southeast Asia. It is known for its brown plumage with white spots and its long tail feathers. They are relatively rare, so they may be more expensive, with prices starting at around Rs. 1,000 per bird.", "image" => "uploads\/product\/1688491612.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491612.jpg\",\"uploads\\\/product\\\/2.jpg1688491612.jpg\"]", "category_id" => 27],

            ["name" => "Rock pigeon", "short_des" => "The rock pigeon is a common pigeon found worldwide. It is known for its gray plumage and its black bars on its wings.", "description" => "The rock pigeon is a common pigeon found worldwide. It is known for its gray plumage and its black bars on its wings.", "image" => "uploads\/product\/1688491867.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491867.jpg\",\"uploads\\\/product\\\/2.jpg1688491867.jpg\"]", "category_id" => 28],

            ["name" => "Amazon parrot", "short_des" => "Amazon parrots are medium-sized parrots native to South America. They are known for their ability to mimic human speech and their playful personalities", "description" => "Amazon parrots are medium-sized parrots native to South America. They are known for their ability to mimic human speech and their playful personalities. They are relatively expensive, with prices starting at around Rs. 50,000 per bird.", "image" => "uploads\/product\/1688491974.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688491974.jpg\",\"uploads\\\/product\\\/3.jpg1688491974.jpg\"]", "category_id" => 29],

            ["name" => "Penguin", "short_des" => "Penguins are flightless seabirds with short wings and thick bodies. They are found in the Southern Hemisphere and are known for their waddling", "description" => "Penguins are flightless seabirds with short wings and thick bodies. They are found in the Southern Hemisphere and are known for their waddling gait and their ability to swim underwater. They are relatively common, with prices starting at around Rs. 25,000 per bird.", "image" => "uploads\/product\/1688492065.jpg", "images" => "[\"uploads\\\/product\\\/1.jpg1688492065.jpg\",\"uploads\\\/product\\\/2.jpg1688492065.jpg\",\"uploads\\\/product\\\/3.jpg1688492065.jpg\"]", "category_id" => 30],

        ];

        foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'short_des' => $productData['short_des'],
                'description' => $productData['description'],
                'status' => 1,
                'price' =>  rand(500, 5000),
                'quantity' => rand(10, 50),
                'image' => $productData['image'],
                'images' => $productData['images'],
                'store_id' => rand(1, 4),
                'category_id' => $productData['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


/*
 [
                'id' => 1,
                'name' => 'Software Developmentfs',
                'slug' => 's',
                'short_des' => 's',
                'description' => 's',
                'price' => '3.00',
                'stock_status' => 1,
                'status' => 1,
                'featured' => 0,
                'quantity' => 3,
                'image' => 'uploads/product/1688144161.jpg',
                'images' => '["uploads\\/product\\/ducks.jpg1688144161.jpg\",\"uploads\\/product\\/finches.jpg1688144161.jpg\",\"uploads\\/product\\/hens.jpg1688144161.jpg\"]',
                'category_id' => 22,
                'store_id' => 11,
                'created_at' => '2023-06-30 11:22:48',
                'updated_at' => '2023-06-30 13:38:44',
            ],
            
            
            
*/