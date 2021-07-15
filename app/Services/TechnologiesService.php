<?php

namespace App\Services;

use App\Models\Technologies;

class TechnologiesService
{
    public function index()
    {
        return Technologies::paginate(3);
    }

    public function create($request)
    {
        $technology = new Technologies;
        $technologies = Technologies::all();
        $countTechnologies = count($technologies);
        $technology->name = $request->name;
        $technology->order_no = $countTechnologies;
        $technology->save();
        return $technology;
    }

    public function show($id)
    {
        return Technologies::FindOrFail($id);
    }

    public function update($request, $id)
    {
        $technology = Technologies::FindOrFail($id);
        $technology->name = $request->name;
        $technology->update();
        return $technology;
    }

    public function destroy($id)
    {
        $technology = Technologies::FindOrFail($id);
        $technology->delete();
        $technologies = Technologies::all();
        foreach ($technologies as $index => $item) {
            $item->order_no = $index;
            $item->update();
        }
        return $technology;
        
    }
}
