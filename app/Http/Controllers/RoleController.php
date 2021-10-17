<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\ViewEndpointUser;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Role::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $role = Role::create($request->all());
            
            if(!is_null($request->permissions)){
                foreach($request->permissions as $permission){
                    $role->permissions()->attach($permission);
                }
            }

            return [
                'message' => 'Role created successfully',
                'type' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $role = Role::find($id);
            if (is_null($role))
                return [
                    'message' => 'Role not exist',
                    'type' => 'warning'
                ];

            return $role;
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $role = Role::find($id);
            if (is_null($role))
                return [
                    'message' => 'Role not exist',
                    'type' => 'warning'
                ];
            
            $role->name=$request->name;
            $role->description=$request->description;
            $role->save();

            return [
                'message' => 'Role updated successfully',
                'type' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listRolesUser($id){
        try {
            $user = User::find($id);
            if (is_null($user))
                return [
                    'message' => 'Role not exist',
                    'type' => 'warning'
                ];
            $user->roles = $user->roles;

            return $user;
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }

    public function listRolesUsers(){
        
        $viewList = ViewEndpointUser::select('*')->paginate(10);
        return $viewList;
    }

    public function updateRoleUser(Request $request, $user_id){
        try {
            $user = User::find($user_id);
            if (is_null($user))
                return [
                    'message' => 'Role not exist',
                    'type' => 'warning'
                ];
            $user->roles()->sync($request->roles_id);

            return $user;
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }

    public function updateRolePermission(Request $request, $role_id){
        try {
            $role = Role::find($role_id);
            if (is_null($role))
                return [
                    'message' => 'Role not exist',
                    'type' => 'warning'
                ];
            $role->permissions()->sync($request->permissions_id);

            return $role;
        } catch (\Exception $e) {
            return [
                'message' => $e,
                'type' => 'danger'
            ];
        }
    }


    
}
