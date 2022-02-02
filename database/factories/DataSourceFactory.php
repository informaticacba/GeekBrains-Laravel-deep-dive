<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DataSourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'Title',
            'link' => '#'
        ];
    }
}
