<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->bs(),
            'body' => fake()->realTextBetween($minNbChars = 500, $maxNbChars = 2000),
            // 'img_path' => function () {
            //     $absolutePath = fake()->image(storage_path('app/public/images'), 640, 480, 'cats', true);

            //     return str_replace(storage_path('app/public/'), '', $absolutePath);
            // },
            'img_path' => function () {
                $imageUrl = 'https://picsum.photos/640/480?random=' . fake()->unique()->numberBetween(1, 1000);
                $imageContent = file_get_contents($imageUrl);
                $imageName = 'images/' . uniqid() . '.jpg';
                Storage::put('public/' . $imageName, $imageContent);

                return $imageName;
            },
            'published_at' => fake()->dateTimeBetween('-2 months', '+ 1 month'),
            'user_id' => User::get()->random()->id,
        ];
    }
}
