<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Danilo',
            'email' => 'danilondosantos@gmail.com',
            'password' => bcrypt('danilo123')
        ]);
    }
}
