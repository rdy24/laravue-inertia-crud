<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Camilan',
            'Makanan Cepat Saji',
            'Dessert',
            'Main Course',
            'Appetizer',
        ];
        
        for($i = 0; $i < count($categories); $i++) {
            $uuid = 'e4eaaaf2-d142-11e1-b3e4-080027620cd';
            Category::create([
                'id' => $uuid . $i,
                'name' => $categories[$i],
                'slug' => Str::slug($categories[$i]),
            ]);
        }
    }
}
