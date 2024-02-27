<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        $tags = Tag::factory(15)->create();
        $posts = Post::factory(40)->create();

        foreach ($posts as $post)
        {
            $tagsId = $tags->random(4)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
