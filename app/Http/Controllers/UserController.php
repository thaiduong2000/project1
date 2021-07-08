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

    public function viewAddUser()
    {
        $role = Roles::all();
        return view('user.add_user',compact('role'));
    }

    public function createUser(Request $request){ 
        $this->userService->createUser($request);
        return back()->with('success','Created Successful!');
    }

    public function getUser($id){
        $role = Roles::all();
        $user = $this->userService->getUser($id);
        return view('user.update_user',compact('user','role'));

    }

    public function updateUser(Request $request){
        $user = $this->userService->updateUser($request);
        return back()->with('success','Update Successful!');
    }

    public function deleteUser($id){
        $this->userService->deleteUser($id);
        return back()->with('success','Delete Successful!');
    }
}
