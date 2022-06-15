<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Province;
use App\Models\Departement;
use App\Models\Directorate;

class OpenWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'     => User::factory(),
            'departement_id'      => Departement::inRandomOrder()->first()->id,
            'province_id'       => Province::inRandomOrder()->first()->id,
            'directorate_id' => Directorate::inRandomOrder()->first()->id,
            'title'      => $this->faker->work(3,true),
            'description'   => $this->faker->paragraph,
            'num_day'   => $this->faker->numberBetween($min = 1,$max = 30),
            'pric'   => $this->faker->numberBetween($min = 1500,$max = 6000),
            'address'   => $this->faker->address,
            'stage'   =>$this->faker->data,
            'is_active'   => 1,
        ];
    }
}
