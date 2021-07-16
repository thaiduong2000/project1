<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TechnologiesService;

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
        return view('technologies.add');
    }

    public function create(Request $request)
    {
        $this->technologyService->create($request);
        return back()->with('success','Create Successful!');
    }

    public function get($id)
    {
        $technology = $this->technologyService->get($id);
        return view('technologies.update',compact('technology'));
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
