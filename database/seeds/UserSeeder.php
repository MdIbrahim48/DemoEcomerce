<?php

use App\AdminProfile;
use App\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'email' => 'ibrahim@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        AdminProfile::create([
            'name' => 'test',
            'email' => 'ibrahim@gmail.com',
            'created_by' => 'ibrahim'
        ]);
    }
}
