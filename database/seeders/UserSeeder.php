<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'nama' =>'Admin 1',            
            'username' => 'adminganteng',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'remember_token' => Str::random(60),
        ]

    );
    }
}
