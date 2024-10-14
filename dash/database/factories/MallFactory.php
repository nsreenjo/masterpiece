<?php

namespace Database\Factories;

use App\Models\Mall;
use Illuminate\Database\Eloquent\Factories\Factory;

class MallFactory extends Factory
{
    protected $model = Mall::class;

    public function definition()
    {

        $images = [
            '2019-06-20.jpg',
            'download (1).jpeg',
            'download.jpeg',
           'aswaqAltawfer(3).jpeg' ,
          
        ];


        return [
            'mall_name' => $this->faker->company,
            'mall_address' => $this->faker->word(3),
            'mall_descrbtion' => implode(' ', $this->faker->words(5)),
            'mall_image' => $this->faker->randomElement($images),
        ];
    }
}

