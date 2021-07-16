<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TechnologiesService;
use App\Models\Technologies;

class TechnologiesController extends Controller
{
    public $technologyService;
    
    public function __construct(TechnologiesService $technologyServiceService)
    {
        $this->technologyService = $technologyServiceService;
    }
    
    public function index()
    {
        $technologies = $this->technologyService->index();
        return view('technologies.index',compact('technologies'));
    }

    public function viewAdd()
    {
        $technology = new Technologies();
        $action = route('createTechnology');
        $button = 'Create';
        return view('technologies.create_or_update',compact('technology','action','button'));
    }

    public function create(Request $request)
    {
        $this->technologyService->create($request);
        return back()->with('success','Create Successful!');
    }

    public function viewUpdate($id)
    {
        $technology = $this->technologyService->get($id);
        $action = route('updateTechnology');
        $button = 'Update';
        return view('technologies.create_or_update',compact('technology','action','button'));
    }

    public function update(Request $request)
    {
        $technology = $this->technologyService->update($request);
        return back()->with('success','Update Successful!');
    }

    public function delete($id)
    {
        $this->technologyService->delete($id);
        return back()->with('success','Delete Successful!');
    }

}
