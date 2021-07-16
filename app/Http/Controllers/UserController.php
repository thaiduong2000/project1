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
        $user = new User();
        $action = route('createUser');
        $button = 'Create';
        return view('user.create_or_update',compact('user','roles','action','button'));
    }

    public function create(Request $request){ 
        $this->userService->create($request);
        return back()->with('success','Created Successful!');
    }

    public function viewUpdate($id){
        $roles = Roles::all();
        $user = $this->userService->get($id);
        $action = route('updateUser');
        $button = 'Update';
        return view('user.create_or_update',compact('user','roles','action','button'));
    }

    public function update(Request $request){
        $user = $this->userService->update($request);
        return back()->with('success','Update Successful!');
    }

    public function delete($id){
        $this->userService->delete($id);
        return back()->with('success','Delete Successful!');
    
    }

    public function sortDelete(){
        $getAll = User::withTrashed()->get();
        $onlyRowSortDelete = User::onlyTrashed()->get(); 
        return view('user.list_sort_delete',compact('getAll','onlyRowSortDelete')); 
    }
}
