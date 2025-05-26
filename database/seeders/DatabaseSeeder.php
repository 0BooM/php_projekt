<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        User::factory()->create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com'
        ]);

        $categories = [
            'Technology',
            'Science',
            'Sport',
            'Politics',
            'Health',
            'Entertainment',
            'Business',
            'Lifestyle',
            'Travel',
            'Education',
            'Food',
            'Fashion',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        // Post::factory(30)->create();
    }
}
