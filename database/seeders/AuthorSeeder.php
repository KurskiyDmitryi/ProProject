<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        [
            'name' => $this->faker->name(),
            "from" => $this->faker->country(),
            "age" => $this->faker->numberBetween(20, 75),
        ];
    }
}
