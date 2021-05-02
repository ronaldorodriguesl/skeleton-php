<?php

namespace App\Domain\Users\Database\Factories;

use Illuminate\Support\Facades\Hash;
use App\Domain\Users\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $chanceOfGettingTrue = 50;

        return [
            'name' => $this->faker->name,
            'login' => $this->faker->username,
            'active' => $this->faker->boolean($chanceOfGettingTrue),
            'password' =>  Hash::make('secret'),
        ];
    }
}
