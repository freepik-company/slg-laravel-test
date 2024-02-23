<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Download;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $users =  User::all();

        $articles->each(function ($article) use ($users) {
            $numUsers = rand(0, 100);
            if ($numUsers === 0) {
                return;
            }
            $users = $users->random($numUsers);

            foreach ($users as $user) {
                Download::create([
                    'user_id' => $user->id,
                    'article_id' => $article->id,
                ]);
            }
        });
    }
}
