<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'John Doe',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'profession' => 'Web Developer',
            'description' => 'This is a sample description for the admin user. This user has all the permissions to manage the application.',
            'phone' => '081234567890',
            'address' => 'Jl. Jendral Sudirman No. 1, Jakarta Pusat',
            'photo' => 'default.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
