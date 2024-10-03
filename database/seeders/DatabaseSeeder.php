<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Anshu Singh',
        //     'email' => 'anshu001@yopmail.com',
        //     'password' => Hash::make('Anshu@123')
        // ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin1@example.com',
            'password' => 'Admin@123',
            'user_type' => '1'
        ]);
    }
}
