<?php
namespace App\Services;

use App\Models\User;

class UserService{

    public function index()
    {
        return User::all();
    }

    public function create($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role = $request->id_role;
        $user->save();
    }

    public function get($id)
    {
       return User::FindOrFail($id);
    }

    public function update($request)
    {
        $user = User::FindOrFail($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role  = $request->id_role;
        $user->update();
    }

    public function delete($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();
    }
}