<?php

namespace Database\Factories;

use App\Models\BlogEntry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->text(20),
            'text' => $this->faker->text(100),
            'author' => function (array $attributes) {
                return User::find($attributes['user_id'])->name;
            }
        ];
    }

}
