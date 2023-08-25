<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
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
        $user = User::where('email', 'contact@placementdirect.fr')->first();
        if ($user == null){
            User::create([
                'username' => 'placement-direct',
                'firstname' => 'PlacementDirect',
                'lastname' => 'Administateur',
                'password' => Hash::make(config('Admin2022')),
                'email' => 'contact@placementdirect.fr',
                'phone' => '0769178981',
                'administrator' => true,
            ]);
        }
    }
}
