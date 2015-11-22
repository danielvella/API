<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Maker;

use App\Http\Requests\CreateVehicleRequest;

class MakerVehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $maker = Maker::find($id);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }   

        return response()->json(['data' => $maker->vehicle], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVehicleRequest $request, $makerID)
    {
        $maker = Maker::find($makerID);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $values = $request->all();

        $maker->vehicle()->create($values);

        return response()->json(['message' => 'The vehicle associated was created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vehicleID)
    {
        $maker = Maker::find($id);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicle->find($vehicleID);

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist for this maker', 'code' => 404], 404);
        }

        return response()->json(['data' => $vehicle], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateVehicleRequest $request, $makerID, $vehicleID)
    {
        $maker = Maker::find($makerID);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicle->find($vehicleID);

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist/belongs to this maker', 'code' => 404], 404);
        }

        $vehicle->color = $request->get('color');
        $vehicle->power = $request->get('power');
        $vehicle->capacity = $request->get('capacity');
        $vehicle->speed = $request->get('speed');

        $vehicle->save();

        return response()->json(['message' => 'Vehicle has been updated successfully'], 200);
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
