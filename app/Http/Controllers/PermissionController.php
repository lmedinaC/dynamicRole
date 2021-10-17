<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Endpoint;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Permission::paginate(10);
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

            $permission = new Permission();
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->save();

            if (!is_null($request->endpoints)) {
                foreach ($request->endpoints as $etp) {
                    $endpoint = new Endpoint();
                    $endpoint->name = $etp["name"];
                    $endpoint->description = $etp["description"];
                    $endpoint->permission_id = $permission->id;
                    $endpoint->save();
                }
            }


            return [
                'message' => 'Permission created successfully',
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
            $permission = Permission::find($id);
            $permission['endpoints'] = Endpoint::where(["permission_id" => $id])->get();
            if (is_null($permission))
                return [
                    'message' => 'Permission not exist',
                    'type' => 'warning'
                ];

            return $permission;
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
            $permission = Permission::find($id);
            if (is_null($permission))
                return [
                    'message' => 'Permission not exist',
                    'type' => 'warning'
                ];

            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->save();

            return [
                'message' => 'permission updated successfully',
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
}
