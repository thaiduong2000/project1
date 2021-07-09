<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;
use App\Models\Roles;

class UserController extends Controller
{
    public $userService;
    
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    
    public function index()
    {   
        $user = $this->userService->index();
        return view('user.index',compact('user'));
    }

    public function viewAdd()
    {
        $roles = Roles::all();
        return view('user.add',compact('roles'));
    }

    public function create(Request $request){ 
        $this->userService->create($request);
        return back()->with('success','Created Successful!');
    }

    public function get($id){
        $roles = Roles::all();
        $user = $this->userService->get($id);
        return view('user.update',compact('user','roles'));
    }

    public function update(Request $request){
        $user = $this->userService->update($request);
        return back()->with('success','Update Successful!');
    }

    public function delete($id){
        $this->userService->delete($id);
        return back()->with('success','Delete Successful!');
    }
}
