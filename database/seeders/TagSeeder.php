<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'tag_name' => '弓手',
        ]);
        
        Tag::create([
            'tag_name' => '馬手',
        ]);
        
        Tag::create([
            'tag_name' => '肩',
        ]);
        
        Tag::create([
            'tag_name' => '胴造り',
        ]);
        
        Tag::create([
            'tag_name' => '早気',
        ]);
        
        
    }
}
