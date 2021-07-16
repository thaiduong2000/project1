<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technologies;
use App\Services\VehiclesService;
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
        return view('vehicles.add',compact('technologies'));
    }

    public function create(Request $request){ 
        $this->vehiclesService->create($request);
        return back()->with('success','Created Successful!');
    }

    public function get($id){
        $technologies = Technologies::all();
        $vehicle = $this->vehiclesService->get($id);
        return view('vehicles.update',compact('vehicle','technologies'));

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
