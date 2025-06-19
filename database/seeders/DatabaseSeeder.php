<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 posts with random data
        for ($i = 0; $i < 10; $i++) {
            $post = Post::create([
                'title' => fake()->sentence(4),
                'description' => fake()->paragraphs(2, true),
                'numberOfLikes' => fake()->numberBetween(0, 1000)
            ]);

            // Create 10 comments for each post
            for ($j = 0; $j < 10; $j++) {
                Comment::create([
                    'post_id' => $post->id,
                    'comment' => fake()->sentences(2, true),
                    'numberOfVotes' => fake()->numberBetween(-50, 100)
                ]);
            }
        }
    }
}
