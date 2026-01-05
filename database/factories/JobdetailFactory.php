<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobdetail>
 */
class JobdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'user_id' => User::inRandomOrder()->value('id'),
            'vacancy' => rand(1, 5),
            'location' => fake()->city,
            'category_id' => Category::inRandomOrder()->value('id'),
            'company_id' => Company::inRandomOrder()->value('id'),
            'type_id' => Type::inRandomOrder()->value('id'),
            'description' => fake()->paragraph(),
            'experience' => rand(1, 5),
        ];
    }
}
