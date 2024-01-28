<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Tag;


//今回はfactoryを用いでseederが動くように設定
class BlogFactory extends Factory
{

    //これは最近のlaravelでは明示する必要ないらしい。昔はいるっぽかったらしい。
    //protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    //生成されるモデルのデフォルトの属性を定義します。このメソッドは、モデルインスタンスが作成される際にどのような属性値を持つべきかを指定
    public function definition()
    {
        $faker = FakerFactory::create('ja_JP');

        return [
            'title' => 'sample'.$faker->realText(10),
            'body' => 'これはサンプルの記事です。' . $faker->realText(200),
            'author_id' => User::inRandomOrder()->first()->id,
        ];
    }

    //ファクトリーの動作をカスタマイズするために使用されます。このメソッドは、ファクトリーがモデルを生成した後の追加の動作や設定を行うために使用されることが多い
    //Blog モデルが作成された後に、ランダムなタグを関連付ける処理が行われる
    public function configure()
    {
        return $this->afterCreating(function (Blog $blog) {
            // 既存のタグからランダムに選ぶ
            //rand(1,3)は1~3こつけるってこと（take）。idで1~3から選ぶのではない。
            $tagIds = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $blog->tags()->sync($tagIds);
        });
    }
}
