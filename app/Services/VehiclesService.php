<?php
namespace App\Services;

use App\Models\Vehicles;

class VehiclesService{

    public function index()
    {
        return Vehicles::all();
    }

    public function create($request)
    {
        $vehicle = new Vehicles;
        $vehicle->name = $request->name;
        $vehicle->technology_id = $request->technology_id;
        $vehicle->save();
    }

    public function get($id)
    {
       return Vehicles::FindOrFail($id);
    }

    public function update($request)
    {
        $vehicle = Vehicles::FindOrFail($request->id);
        $vehicle->name = $request->name;
        $vehicle->technology_id  = $request->technology_id;
        $vehicle->update();
    }

    public function delete($id)
    {
        $vehicle = Vehicles::FindOrFail($id);
        $vehicle->delete();
    }
}