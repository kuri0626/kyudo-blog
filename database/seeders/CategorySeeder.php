<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '弓手',
        ]);
        Category::create([
            'name' => '馬手',
        ]);
        Category::create([
            'name' => '肩',
        ]);
        Category::create([
            'name' => '胴造り',
        ]);
        Category::create([
            'name' => '早気',
        ]);
    }
}
