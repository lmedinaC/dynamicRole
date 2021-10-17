<?php

namespace App\Http\Controllers;
use App\Endpoint;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Endpoint::paginate(10);
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
            
            $endpoint = new Endpoint();
            $endpoint->name=$request->name;
            $endpoint->description=$request->description;
            $endpoint->permission_id=$request->permission_id;
            $endpoint->save();

            return [
                'message' => 'Endpoint created successfully',
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
            $endpoint = Endpoint::find($id);
            if (is_null($endpoint))
                return [
                    'message' => 'Endpoint not exist',
                    'type' => 'warning'
                ];

            return $endpoint;
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
            $endpoint = Endpoint::find($id);
            if (is_null($endpoint))
                return [
                    'message' => 'Endpoint not exist',
                    'type' => 'warning'
                ];
            
            $endpoint->name=$request->name;
            $endpoint->description=$request->description;
            $endpoint->permission_id=$request->permission_id;
            $endpoint->save();

            return [
                'message' => 'Endpoint updated successfully',
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
