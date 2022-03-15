<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersId = User::all('id');
        $ids = $this->faker->randomElements($usersId, 2);

        $created_at = $this->faker->dateTimeBetween('-20 weeks')->getTimestamp();

        return [
            'content' => $this->faker->sentence(rand(3, 10)),
            'user_from_id' => $ids[0],
            'user_to_id' => $ids[1],
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
