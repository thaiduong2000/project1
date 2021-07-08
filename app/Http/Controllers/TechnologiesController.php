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

    public function viewAddTechnology()
    {
        return view('technologies.add_technology');
    }

    public function createTechnology(Request $request)
    {
        $this->technologyService->createTechnology($request);
        return back()->with('success','thêm mới thành công !');
    }

    public function getTechnology($id)
    {

        $technology = $this->technologyService->getTechnology($id);
        return view('technologies.update_technology',compact('technology'));

    }

    public function updateTechnology(Request $request)
    {
        $technology = $this->technologyService->updateTechnology($request);
        return back()->with('success','cập nhật người dùng thành công !');
    }

    public function deleteTechnology($id)
    {
        $this->technologyService->deleteTechnology($id);
        return back()->with('success','Xóa người dùng thành công !');
    }

}
