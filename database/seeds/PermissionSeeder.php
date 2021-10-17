<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $var = ['GestionarRoles', 'GestionarRolUsuario', 'GestionarEndpoints', 'GestionarEnpointsSobrePermisos', 'UsuariosSinEndpoint', 'GestionarPerfil', 'EnpointsPermitidos', 'CerrarSesion'];
        foreach ($var as $v) {
            Permission::create([
                'name' => $v,
            ]);
        }
    }
}
