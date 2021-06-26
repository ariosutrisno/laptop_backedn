<?php

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
        $admin = User::create([
            'name'=>'ario sutrisno',
            'email'=>'sutrisnoario@gmail.com',
            'password'=>Hash::make('ariosutrisno')
        ]);
        $admin->assignRole('admin');
        $user = User::create([
            'name'=>'ario',
            'email'=>'ario@gmail.com',
            'password'=>Hash::make('ariosutrisno')
        ]);
        $user->assignRole('user');
    }
}
