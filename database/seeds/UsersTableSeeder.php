<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
        	'email' => 'test@dummy.com',
        	'phone' => '+91-988665544',
        	'password' => Hash::make('test123')
        ]);
    }
}
