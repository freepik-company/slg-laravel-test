<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(TagSeeder::class);
        Article::factory()->count(100)->create()->each(function ($article) {
            $tagsCount = rand(1, 3);
            $tags = Tag::inRandomOrder()->limit($tagsCount)->get();
            $article->tags()->attach($tags);
        });
    }
}
