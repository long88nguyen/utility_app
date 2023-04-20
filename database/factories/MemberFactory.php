<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => random_int(1,10),
            'name' => $this->faker->name(),
            'phone' =>  1234567,
            'gender' => random_int(1,3),
            'birthday' => $this->faker->date(),
        ];
    }
}
