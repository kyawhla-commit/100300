<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       \App\Models\Article::factory(20)->create();
       \App\Models\Comment::factory(40)->create();

       $List = ['News', 'Tech', 'Web', 'App', 'Oss'];
       foreach ($List as $name) {
        \App\Models\Category::create(['name' => $name ]);
        }
        \App\Models\User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
        ]);
        // \App\Models\Article::factory(50)->create();

        // You can also call other seeders here
        // $this->call(OtherSeeder::class);
        // Example: $this->call(ArticlesTableSeeder::class);
    }
}
