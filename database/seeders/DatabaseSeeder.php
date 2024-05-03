<?php

namespace Database\Seeders;

// use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'user']
        ]);

        DB::table('categories')->insert([
            ['name' => 'Horror', 'slug' => 'horror'],
            ['name' => 'Adventure', 'slug' => 'adventure'],
            ['name' => 'Romance', 'slug' => 'romance']
        ]);

        DB::table('books')->insert([
            'category_id' => '2',
            'name_book' => 'Tomas',
            'slug' => 'tomas',
            'author' => 'barakuda',
            'excerpt' => 'buku tomas selewbi',
            'description_book' => 'buku ini menjelaskan keterlibatan antar tomas dan tomas kereta api',
            'stok'=> '7'
        ]);



        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'fullname' => 'admintea',
            'address' => 'jln hergamana',
            'phone_number' => '0895347086501',
            'gender' => 'laki-laki',
            'password' => Hash::make('aka12345'),
            'role_id' => '1',
        ]);

        DB::table('users')->insert([
            'email' => 'user@gmail.com',
            'fullname' => 'user',
            'address' => 'jln hergamana',
            'phone_number' => '0895347086501',
            'gender' => 'laki-laki',
            'password' => Hash::make('aka12345'),
            'role_id' => '2',
        ]);


        // User::factory(10)->create();
    }
}
