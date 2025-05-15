<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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
            'Art',
            'History',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        Post::factory(30)->create();
    }
}
