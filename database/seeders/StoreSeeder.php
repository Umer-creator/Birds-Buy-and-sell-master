<?php

namespace Database\Seeders;

use App\Models\Store;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = [
            [
                'id' => 1,
                'name' => 'Abbottabad Birds Store',
                'slug' => Str::slug('Abbottabad Birds Store'),
                'description' => 'Nestled in the heart of Abbottabad, Bird Paradise is a haven for bird enthusiasts. Step into a world of vibrant colors and melodious songs as you explore our collection of exquisite avian species. From majestic parrots to graceful peafowls, we offer a diverse range of birds that will captivate your senses. With expert guidance and a passion for aviculture, Bird Paradise is committed to providing a delightful experience for bird lovers of all ages.',
                'address' => 'Main Market, Jinnahabad, Abbottabad, Khyber Pakhtunkhwa, Pakistan',
                'email' => 'abbottabad@example.com',
                'phone' => '123-456-7890',
                'city' => 'Abbottabad',
                'stripeSecretKey' => 'sk_test_51NMnl9J0Zz91VcqmFPzjn92Z5x8eMNPtHBEoPaYQ4GZdv0imCX7cG9f24Hl7S9921DMHkTerCjyJHlYGZArIkxch00eaoFpbmw',
                'image' => 'uploads/store/1.jpg',
                'approved' => true,
                'status' => true,
                'longitude' => 73.2407,
                'latitude' => 35.3191,
                'seller_id' => 2,

            ],

            [
                'id' => 2,
                'name' => 'Haripur Birds Store',
                'slug' => Str::slug('Haripur Birds Store'),
                'description' => 'Located in the scenic city of Haripur, Feather Haven is a paradise for bird enthusiasts. Immerse yourself in the beauty of nature as you explore our wide selection of avian wonders. From charming canaries to majestic peacocks, we offer a diverse range of birds to suit every bird lover\'s preferences. Our knowledgeable staff is dedicated to providing expert guidance and ensuring the well-being of our feathered friends. Visit Feather Haven today and embark on a captivating journey into the world of birds.',
                'address' => 'Main Bazaar, Saddar, Haripur, Khyber Pakhtunkhwa, Pakistan',
                'email' => 'haripur@example.com',
                'phone' => '123-456-7890',
                'city' => 'Haripur',
                'stripeSecretKey' => 'sk_test_51NMnl9J0Zz91VcqmFPzjn92Z5x8eMNPtHBEoPaYQ4GZdv0imCX7cG9f24Hl7S9921DMHkTerCjyJHlYGZArIkxch00eaoFpbmw',
                'image' => 'uploads/store/2.jpg',
                'approved' => true,
                'status' => true,
                'longitude' => 72.9327,
                'latitude' => 33.9995,
                'seller_id' => 3,
            ],

            [
                'id' => 3,
                'name' => 'Mansehra Birds Store',
                'slug' => Str::slug('Mansehra Birds Store'),
                'description' => 'Welcome to Winged Delights, located in the picturesque city of Mansehra. Step into our store and be enchanted by the beauty of our avian companions. We offer a diverse range of birds, from colorful lovebirds to elegant finches, each one handpicked for their unique qualities. Our dedicated team of bird enthusiasts is always ready to assist you in finding the perfect feathered friend. At Winged Delights, we strive to create a harmonious bond between birds and their human companions.',
                'address' => 'Main Road, Shinkiari, Mansehra, Khyber Pakhtunkhwa, Pakistan',
                'email' => 'mansehra@example.com',
                'phone' => '123-456-7890',
                'city' => 'Mansehra',
                'stripeSecretKey' => 'sk_test_51NMnl9J0Zz91VcqmFPzjn92Z5x8eMNPtHBEoPaYQ4GZdv0imCX7cG9f24Hl7S9921DMHkTerCjyJHlYGZArIkxch00eaoFpbmw',
                'image' => 'uploads/store/3.jpg',
                'approved' => true,
                'status' => true,
                'longitude' => 73.4120,
                'latitude' => 35.0460,
                'seller_id' => 4,
            ],

            [
                'id' => 4,
                'name' => 'Havelian Birds Store',
                'slug' => Str::slug('Havelian Birds Store'),
                'description' => 'Discover the enchanting world of birds at Feathered Haven, nestled in the serene town of Havelian. Our store is home to a diverse array of feathered beauties, ranging from charming budgies to elegant parrots. With their vibrant colors and melodious songs, our birds will bring joy and companionship to your life. At Feathered Haven, we prioritize the well-being of our avian friends, ensuring they receive the utmost care and attention. Visit us today and embark on a delightful journey into the avian realm.',
                'address' => 'Main Bazaar, Havelian, Abbottabad, Khyber Pakhtunkhwa, Pakistan',
                'email' => 'havelian@example.com',
                'phone' => '123-456-7890',
                'city' => 'Havelian',
                'stripeSecretKey' => 'sk_test_51NMnl9J0Zz91VcqmFPzjn92Z5x8eMNPtHBEoPaYQ4GZdv0imCX7cG9f24Hl7S9921DMHkTerCjyJHlYGZArIkxch00eaoFpbmw',
                'image' => 'uploads/store/4.jpg',
                'approved' => true,
                'status' => true,
                'longitude' => 73.3137,
                'latitude' => 35.3094,
                'seller_id' => 5,
            ],


        ];



        foreach ($stores as $store) {
            Store::create([
                'id' => $store["id"],
                'name' => $store['name'],
                'slug' => $store['slug'],
                'description' => $store['description'],
                'address' => $store['address'],
                'email' => $store['email'],
                'phone' => $store['phone'],
                'city' => $store['city'],
                'stripeSecretKey' => $store['stripeSecretKey'],
                'image' => $store['image'],
                'approved' => $store['approved'],
                'status' => $store['status'],
                'longitude' => $store['longitude'],
                'latitude' => $store['latitude'],
                'seller_id' => $store['seller_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
