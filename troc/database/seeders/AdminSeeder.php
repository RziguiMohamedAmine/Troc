<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' =>now(),
            'password' =>'$2y$10$mohvkynLOjVr8Bz3KfR3sepwkmTIsxYZKcPrx1B69L29txhdcVgnq'
        ]);
        $user->assignRole('admin');
    }
}
