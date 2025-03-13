<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The model that the factory applies to.
     */
    protected $model = \App\Models\User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'userRole' => 'User',
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->userName(),
            'password' => Hash::make('password'), // Default password for testing
            'dob' => $this->faker->date(),
            'security_answers' => json_encode([
                'question1' => 'answer1',
                'question2' => 'answer2',
                'question3' => 'answer3'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
