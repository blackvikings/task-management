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
//        User::create([
//            'name' => 'Admin',
//            'email' => 'admin@test.com',
//            'password' => Hash::make('Password')
//        ]);

        User::create([
            'name' => 'Rita',
            'mobile_no' => '7894561230',
            'email' => 'rita@test.com',
            'password' => Hash::make('Password')
        ]);
        User::create([
            'name' => 'Rohan',
            'mobile_no' => '9876543210',
            'email' => 'rohan@test.com',
            'password' => Hash::make('Password')
        ]);
        User::create([
            'name' => 'Rani',
            'mobile_no' => '6547891230',
            'email' => 'rani@test.com',
            'password' => Hash::make('Password')
        ]);
        User::create([
            'name' => 'Akash',
            'mobile_no' => '1234567890',
            'email' => 'akash@test.com',
            'password' => Hash::make('Password')
        ]);
        User::create([
            'name' => 'Rahul',
            'mobile_no' => '0147852369',
            'email' => 'rahul@test.com',
            'password' => Hash::make('Password')
        ]);
        User::create([
            'name' => 'Rina',
            'mobile_no' => '3698527410',
            'email' => 'rina@test.com',
            'password' => Hash::make('Password')
        ]);

    }
}
