<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            //password is admin12345clea
            'password' => '$2y$10$v82RSl8cn2MioP5nyK6c0uYL.DD0AO0T0IGnOk29SOHTW9L/onX9u',
            'utype' => 'admin',
        ]);

        // \App\Models\User::factory(11)->create();
        // \App\Models\Category::factory(12)->create();
        // \App\Models\Store::factory(12)->create();
        // \App\Models\Product::factory(24)->create();
        */
        $this->call([
            UserSeeder::class,
            CategroySeeder::class,
            StoreSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
