<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            'name' => 'Pesto Pasta Chicken',
            'description' => 'This is the description of a meal kit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, quibusdam!',
            'price' => 30000,
            'duration' => 40,
            'img_path' => 'pesto_pasta_chicken.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('meals')->insert([
            'name' => 'Unagi Ramen',
            'description' => 'This is the description of a meal kit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, quibusdam!',
            'price' => 30000,
            'duration' => 40,
            'img_path' => 'pesto_pasta_chicken.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('meals')->insert([
            'name' => 'Nabe Veggie Udon',
            'description' => 'This is the description of a meal kit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, quibusdam!',
            'price' => 25000,
            'duration' => 40,
            'img_path' => 'nabe_veggie_udon.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
