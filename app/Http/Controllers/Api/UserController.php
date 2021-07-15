<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Traits\ApiFormatResponse;

class UserController extends Controller
{
    use ApiFormatResponse;

    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = $this->userService->index();
            return  $this->responseList($user);
        } catch (\Throwable $th) {
            return  $this->responseError($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = $this->userService->store($request);
            return  $this->responseSuccess($user);
        } catch (\Throwable $th) {
            return  $this->responseError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = $this->userService->show($id);
            return  $this->responseSuccess($user);
        } catch (\Throwable $th) {
            return  $this->responseError($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = $this->userService->update($request, $id);
            return  $this->responseSuccess($user);
        } catch (\Throwable $th) {
            return  $this->responseError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->userService->destroy($id);
            return  $this->responseSuccess($user, true, "Delete user succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseError(false, "Delete user fail", $th->getMessage());
        }
    }
}
