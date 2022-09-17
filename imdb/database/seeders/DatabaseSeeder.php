<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'username' => 'Test',
            'password' => bcrypt('password'),
            'email' => 'test@test.com',
            'admin' => true
        ]);

        \App\Models\Movie::factory(6)->create([
            'user_id' => '1'
        ]);
        \App\Models\Review::factory(10)->create([
            'user_id' => '1'
        ]);

    }
}
