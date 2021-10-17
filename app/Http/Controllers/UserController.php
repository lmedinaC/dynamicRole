<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\ViewEndpointUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            if (is_null($user))
                return [
                    'message' => 'User not exist',
                    'type' => 'warning'
                ];

            return $user;
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
    public function update(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            if (is_null($user))
                return [
                    'message' => 'User not exist',
                    'type' => 'warning'
                ];

            $user->name = $request->name;
            $user->save();

            return [
                'message' => 'User updated successfully',
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


    /**
     *  para ver la lista de endpoints de usuario ath
     */
    public function endpointList()
    {
        $user_id = Auth::user()->id;
        $viewList = ViewEndpointUser::select('*')->where(['user_id' => $user_id])->paginate(10);
        return $viewList;
    }
}
