<?php
namespace App\Services;

use App\Models\Technologies;

class TechnologiesService{

    public function index()
    {
        return Technologies::all();
    }

    public function create($request)
    {
        $technology = new Technologies;
        $technologies = Technologies::all();
        $countTechnologies = count($technologies);
        $technology->name = $request->name;
        $technology->order_no = $countTechnologies;
        $technology->save();
    }

    public function get($id)
    {
       return Technologies::FindOrFail($id);
    }

    public function update($request)
    {
        $technology = Technologies::FindOrFail($request->id);
        $technology->name = $request->name;
        $technology->update();
    }

    public function delete($id)
    {
        $technology = Technologies::FindOrFail($id);
        $technology->delete();
        $technologies = Technologies::all();
        foreach($technologies as $index => $technology){
            $technology->order_no = $index;
            $technology->update();
        }
    }
}