<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admincms@admin.com')->first();

        if (!$user) {

            User::create([

                'name' => 'vin Rock',

                'email' => 'admincms@admin.com',
                
                'role' => 'admin',

                'password' => Hash::make('password')

            ]);

        }
    }
}
