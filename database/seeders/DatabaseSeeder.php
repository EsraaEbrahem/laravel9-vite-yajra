<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Subscriber;
use App\Models\User;
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
        User::factory(10)->create();
        Blog::factory(20)->create();
        Subscriber::factory(20)->create();
    }
}
