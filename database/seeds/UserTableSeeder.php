<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'userExample', 'email' => 'userexample@email.com', 'email_verified_at' => now(), 'password' => Hash::make('1234'), 'role_id' => 1, 'region_id' => 1, 'rank_id' => 1, 'avatar_id' => null, 'remember_token' => null, 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'adminExample', 'email' => 'adminexample@email.com', 'email_verified_at' => now(), 'password' => Hash::make('1234'), 'role_id' => 2, 'region_id' => 2, 'rank_id' => 1, 'avatar_id' => null, 'remember_token' => null, 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
