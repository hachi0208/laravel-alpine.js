<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['tag_name' => 'sample1']);
        Tag::create(['tag_name' => 'sample2']);
        Tag::create(['tag_name' => 'sample3']);
        Tag::create(['tag_name' => 'sample4']);
        Tag::create(['tag_name' => 'sample5']);
    }
}
