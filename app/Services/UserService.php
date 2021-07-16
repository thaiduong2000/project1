<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function index()
    {
        return User::paginate(5);
    }

    public function store($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role = $request->id_role;
        $user->save();
        return $user;
    }

    public function show($id)
    {
        return User::FindOrFail($id);
    }

    public function update($request, $id)
    {
        $user = User::FindOrFail($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->id_role  = $request->id_role;
        $user->update();
        return $user;
    }

    public function destroy($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();
        return $user;
    }
}
