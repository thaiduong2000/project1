<?php
namespace App\Services;

use App\Models\User;

class UserService{

    public function index()
    {
        return User::all();
    }

    public function createUser($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role = $request->id_role;
        $user->save();
    }

    public function getUser($id)
    {
       return User::FindOrFail($id);
    }

    public function updateUser($request)
    {
        $user = User::FindOrFail($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role  = $request->id_role;
        $user->update();
    }

    public function deleteUser($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();
    }
}