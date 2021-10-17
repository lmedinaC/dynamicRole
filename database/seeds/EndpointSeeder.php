<?php

use Illuminate\Database\Seeder;
use App\Endpoint;

class EndpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = [
            [
                "name"=>'user.showUser',
                'permission_id'=>6,
            ],
            [
                "name"=>'user.updateUser',
                'permission_id'=>6,
            ],
            [
                "name"=>'user.endpointList',
                'permission_id'=>6,
            ],
            [
                "name"=>'endpoint.index',
                'permission_id'=>3,
            ],
            [
                "name"=>'endpoint.store',
                'permission_id'=>3,
            ],
            [
                "name"=>'endpoint.show',
                'permission_id'=>3,
            ],
            [
                "name"=>'endpoint.update',
                'permission_id'=>3,
            ],
            [
                "name"=>'endpoint.usersWithoutEndpoint',
                'permission_id'=>5,
            ],
            [
                "name"=>'permission.index',
                'permission_id'=>2,
            ],
            [
                "name"=>'permission.store',
                'permission_id'=>2,
            ],
            [
                "name"=>'permission.show',
                'permission_id'=>2,
            ],
            [
                "name"=>'permission.update',
                'permission_id'=>2,
            ],
            [
                "name"=>'role.index',
                'permission_id'=>1,
            ],
            [
                "name"=>'role.store',
                'permission_id'=>1,
            ],
            [
                "name"=>'role.show',
                'permission_id'=>1,
            ],
            [
                "name"=>'role.updateRoleUser',
                'permission_id'=>2,
            ],
            [
                "name"=>'role.listRolesUsers',
                'permission_id'=>2,
            ],
            [
                "name"=>'role.listRolesUser',
                'permission_id'=>1, 
            ],
            [
                "name"=>'role.updateRolePermission',
                'permission_id'=>2,
            ],
            [
                "name"=>'login',
                'permission_id'=>6,
            ],
            [
                "name"=>'logout',
                'permission_id'=>8,
            ],
        ];
        foreach ($var as $val) {
            Endpoint::create([
                'name' => $val['name'],
                'permission_id' => $val['permission_id'],
            ]);
        }
    }
}
