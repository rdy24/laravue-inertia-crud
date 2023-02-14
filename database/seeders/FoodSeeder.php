<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            'Ayam Goreng',
            'Nasi Goreng',
            'Es Campur',
            'Kerupuk',
            'Kue Coklat',
            'Kue Kering'
        ];

        for($i = 0; $i < 10;$i++) {
            $uuid = 'e4eaaaf2-d142-11e1-b3e4-080027620cd';
            Food::create([
                'id' => Str::uuid(),
                'category_id' => $uuid . rand(0, 2),
                'name' => $foods[rand(0, count($foods) - 1)],
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis optio architecto fugit maiores, consectetur pariatur error doloribus enim odio incidunt voluptate et tenetur, praesentium molestiae eaque. Ipsum iure quod sit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis optio architecto fugit maiores, consectetur pariatur error doloribus enim odio incidunt voluptate et tenetur, praesentium molestiae eaque. Ipsum iure quod sit.',
            ]);
        }
    }
}
