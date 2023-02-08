<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
        [
            'name' => 'admin',
            'email' => 'kuri.taka.18@outlook.jp',
            'email_verified_at' => now(),
            'password' => \Hash::make('kuri0626'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => 'other',
            'email' => 'kuri.taka.15@docomo.ne.jp',
            'email_verified_at' => now(),
            'password' => \Hash::make('kuritaka0626'),
            'admin' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);
    }
}
