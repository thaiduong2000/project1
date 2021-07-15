<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\VehiclesService;
use App\Traits\ApiFormatResponse;

class VehiclesController extends Controller
{
    use ApiFormatResponse;

    public $vehiclesService;
    public function __construct(VehiclesService $vehiclesService)
    {
        $this->vehiclesService = $vehiclesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $vehicles = $this->vehiclesService->index();
            return  $this->responseList($vehicles, true, "Get list vehicle succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseError(null, false, "Get list vehicle fail", $th->getMessage());
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
            $vehicle = $this->vehiclesService->store($request);
            return  $this->responseSuccess($vehicle, true, "Create vehicle succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseSuccess(null, false, "Create vehicle fail", $th->getMessage());
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
            $vehicle = $this->vehiclesService->show($id);
            return  $this->responseSuccess($vehicle, true, "Get vehicle succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseError(null, false, "Get vehicle fail", $th->getMessage());
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
            $vehicle = $this->vehiclesService->update($request,$id);
            return  $this->responseSuccess($vehicle, true, "Update vehicle succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseError(null, false, "Update vehicle fail", $th->getMessage());
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
            $vehicle = $this->vehiclesService->destroy($id);
            return  $this->responseSuccess($vehicle, true, "Update vehicle succsess", null);
        } catch (\Throwable $th) {
            return  $this->responseError(null, false, "Update vehicle fail", $th->getMessage());
        }
    }
}
