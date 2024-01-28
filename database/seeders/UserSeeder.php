<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
            'name' => 'Sample User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password01'),
            ]);
        User::create(
            [
            'name' => 'Sample User2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password02'),
            ]);
        User::create(
            [
            'name' => 'Sample User3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password03'),
            ]);
        User::create(
            [
            'name' => 'Sample User4',
            'email' => 'user4@example.com',
            'password' => Hash::make('password04'),
            ]);
    }
}
