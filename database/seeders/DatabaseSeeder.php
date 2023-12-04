<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'kelvinleonardos',
            'name' => 'Kelvin Leonardo Sianipar',
            'email' => 'kelvinlsianipar@gmail.com',
            'phone' => '081386444771',
            'email_verified_at' => now(),
            'password' => '12345678',
            'address' => 'Jl. Politeknik',
            'city' => 'Makassar',
            'country' => 'Indonesia',
            'role' => 1,
            'most_interest' => 'tech',
            'profile_pict' => fake()->sentence(3),
        ]);
        \App\Models\Company::factory(10)->create();
        \App\Models\Job::factory(100)->create();
    }
}
