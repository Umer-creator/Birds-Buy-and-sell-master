<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "id" => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                // password is 12345678
                'password' => '$2y$10$d7.Cz4WiIPqA24pTDgIIzONaMa8dVg5KZFRIfYO2RFWpqiOXpEBpe',
                'profile_photo_path' => 'uploads/user/user.jpg',
                'seller_status' => 0,
                'utype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 2,
                'name' => 'Ahmed Ali',
                'email' => 'seller1@gmail.com',
                // password is 12345678
                'password' => '$2y$10$d7.Cz4WiIPqA24pTDgIIzONaMa8dVg5KZFRIfYO2RFWpqiOXpEBpe',
                'utype' => 'user',
                'profile_photo_path' => 'uploads/user/user.jpg',
                'seller_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 3,
                'name' => 'Bilal Ahmed',
                'email' => 'seller2@gmail.com',
                // password is 12345678
                'password' => '$2y$10$d7.Cz4WiIPqA24pTDgIIzONaMa8dVg5KZFRIfYO2RFWpqiOXpEBpe',
                'utype' => 'user',
                'profile_photo_path' => 'uploads/user/user.jpg',
                'seller_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 4,
                'name' => 'Basit Ali',
                'email' => 'seller3@gmail.com',
                // password is 12345678
                'password' => '$2y$10$d7.Cz4WiIPqA24pTDgIIzONaMa8dVg5KZFRIfYO2RFWpqiOXpEBpe',
                'utype' => 'user',
                'profile_photo_path' => 'uploads/user/user.jpg',
                'seller_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "id" => 5,
                'name' => 'Haroon Khan',
                'email' => 'seller4@gmail.com',
                // password is 12345678
                'password' => '$2y$10$d7.Cz4WiIPqA24pTDgIIzONaMa8dVg5KZFRIfYO2RFWpqiOXpEBpe',
                'utype' => 'user',
                'profile_photo_path' => 'uploads/user/user.jpg',
                'seller_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
