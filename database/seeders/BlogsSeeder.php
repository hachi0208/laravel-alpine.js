<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //factoryを使ってランダムに5個生成
    public function run()
    {
        Blog::factory()->count(5)->create(); // 5つの記事を生成
    }
}
