<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'forname' => 'mix',
            'email' => 'admin@bar.fr',
            'password' => Hash::make('alcoolique'),
        ]);
    }

}
