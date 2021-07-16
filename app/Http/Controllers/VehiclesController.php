<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technologies;
use App\Services\VehiclesService;
use App\Models\Vehicles;
class VehiclesController extends Controller
{
    public $vehiclesService;
    
    public function __construct(VehiclesService $vehiclesService)
    {
        $this->vehiclesService = $vehiclesService;
    }
    
    public function index()
    {   
        $vehicles = $this->vehiclesService->index();
        return view('vehicles.index',compact('vehicles'));
    }

    public function viewAdd()
    {
        $technologies = Technologies::all();
        $vehicle  = new Vehicles();
        $action = route('createVehicle');
        $button = 'Create';
        return view('vehicles.create_or_update',compact('technologies','vehicle','action','button'));
    }

    public function create(Request $request){ 
        $this->vehiclesService->create($request);
        return back()->with('success','Created Successful!');
    }

    public function viewUpdate($id){
        $technologies = Technologies::all();
        $vehicle = $this->vehiclesService->get($id);
        $action = route('updateVehicle');
        $button = 'Update';
        return view('vehicles.create_or_update',compact('vehicle','technologies','action','button'));

    }

    public function update(Request $request){
        $vehicle = $this->vehiclesService->update($request);
        return back()->with('success','Update Successful!');
    }

    public function delete($id){
        $this->vehiclesService->delete($id);
        return back()->with('success','Delete Successful!');
    }
}
