<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'desmond',
            'email' => 'azubuikedesmond97@gmail.com',
            'password' => Hash::make('Password@1'),
        ]);
        $user->assignRole('admin');
    }
}
