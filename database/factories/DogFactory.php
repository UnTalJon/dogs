<?php

namespace Database\Factories;

use App\Models\Dog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DogFactory extends Factory
{
    protected $model = Dog::class;

    public function definition(): array
    {
        $minAge = 1; // años
        $maxAge = 10; // años
        $minSize = 20; // cm
        $maxSize = 70; // cm

        return [
            'name' => $this->faker->firstName(),
            'age' => $this->faker->numberBetween($minAge, $maxAge),
            'size' => $this->faker->numberBetween($minSize, $maxSize),
            'description' => $this->faker->text(),
            'photo_url' => $this->faker->url(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
