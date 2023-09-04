<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
           'name' => 'Sys Admin',
           'email' => 'sysadmin@example.com',
           'password' => Hash::make('admin@1234'),
           'role' => 'admin'
        ]);
    }
}
