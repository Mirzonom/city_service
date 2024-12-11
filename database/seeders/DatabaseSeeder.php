<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\OrdersTableSeeder;
use Database\Seeders\PostsTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            OrdersTableSeeder::class,
            PostsTableSeeder::class,
        ]);
    }
}
