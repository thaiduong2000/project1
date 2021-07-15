<?php

namespace App\Services;

use App\Models\Vehicles;

class VehiclesService
{
    public function index()
    {
        return Vehicles::paginate(3);
    }

    public function store($request)
    {
        $vehicle = new Vehicles;
        $vehicle->name = $request->name;
        $vehicle->technology_id = $request->technology_id;
        $vehicle->save();
        return $vehicle;
    }

    public function show($id)
    {
        return Vehicles::FindOrFail($id);
    }

    public function update($request, $id)
    {
        $vehicle = Vehicles::FindOrFail($id);
        $vehicle->name = $request->name;
        $vehicle->technology_id = $request->technology_id;
        $vehicle->update();
        return $vehicle;
    }

    public function destroy($id)
    {
        $vehicle = Vehicles::FindOrFail($id);
        $vehicle->delete();
        return $vehicle;
    }
}
