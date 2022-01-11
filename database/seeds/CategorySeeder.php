<?php

use App\Category;
use Faker\Factory;
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
        $faker = Factory::create();
        
        foreach (range(1, 20) as $index) {
            $food_name = $faker->name;
            Category::create([
                'name' => $food_name,
                'image' => 'default.png',
                'slug' => Str::slug($food_name),
                'cat_bg_color' => 'bg-13',
                'status' => '1',
                'created_by' => 'ibrahim'
            ]);
        }
    }
}
