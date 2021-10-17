<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Luis asd',
            'email' => 'luis.medcast3@gmail.com',
            'password' => Hash::make("adminTest1234"),
        ]);

        DB::table('user_role')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('user_role')->insert([
            'user_id' => 1,
            'role_id' => 2,
        ]);
        DB::table('user_role')->insert([
            'user_id' => 1,
            'role_id' => 3,
        ]);
    }
}
