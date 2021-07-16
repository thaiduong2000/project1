<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TechnologiesService;
use App\Traits\ApiFormatResponse;

class TechnologiesController extends Controller
{
    use ApiFormatResponse;

    public $technologiesService;
    public function __construct(TechnologiesService $technologiesService)
    {
        $this->technologiesService = $technologiesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $technologies = $this->technologiesService->index();
            return  $this->responseList($technologies);
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
            $technology = $this->technologiesService->store($request);
            return  $this->responseSuccess($technology);
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
            $technology = $this->technologiesService->show($id);
            return  $this->responseSuccess($technology);
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
            $technology = $this->technologiesService->update($request, $id);
            return  $this->responseSuccess($technology);
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
            $technology = $this->technologiesService->destroy($id);
            return  $this->responseSuccess($technology);
        } catch (\Throwable $th) {
            return  $this->responseError($th->getMessage());
        }
    }
}
