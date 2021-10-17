<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = ['invitado','administrador','usuario autenticado'];
        foreach ($var as $v){
            Role::create([
                'name' => $v,
            ]);
        }
        $var_relation = [
            [
                "permission_id" => 1,
                "role_id" => 2
            ],
            [
                "permission_id" => 2,
                "role_id" => 2
            ],
            [
                "permission_id" => 3,
                "role_id" => 2
            ],
            [
                "permission_id" => 4,
                "role_id" => 2
            ],
            [
                "permission_id" => 5,
                "role_id" => 2
            ],
            [
                "permission_id" => 6,
                "role_id" => 3
            ],
            [
                "permission_id" => 7,
                "role_id" => 3
            ],
            [
                "permission_id" => 8,
                "role_id" => 3
            ],
        ];

        foreach($var_relation as $v){
            DB::table('role_permission')->insert([
                'permission_id' => $v['permission_id'],
                'role_id' => $v['role_id']
            ]);

        }

    }
}
