<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiFormatResponse
{
  public function responseList($data)
  {
    return response()->json([
      "success" => true,
      "message" => "Get list successfully",
      "data"    => $data->items(),
      "links"   => [
        "first"   => $data->url(1),
        "last"    => $data->url($data->lastPage()),
        "prev"    => $data->previousPageUrl(),
        "next"    => $data->nextPageUrl()
      ],
      "meta"    => [
        "current_page"  => $data->currentPage(),
        "from"          => $data->firstItem(),
        "last_page"     => $data->lastPage(),
        "path"          => $data->getOptions(),
        "per_page"      => $data->perPage(),
        "to"            => $data->lastItem(),
        "total"         => $data->total()
      ]
    ], response::HTTP_OK);
  }

  public function responseSuccess($data)
  {
    return response()->json([
      "success" =>  true,
      "message" => "Successfully",
      "data"    => $data,
    ], response::HTTP_OK);
  }

  public function responseError($error)
  {
    return response()->json([
      "success" => false,
      "message" => "Failed",
      "errors"  => $error,
    ], response::HTTP_BAD_REQUEST);
  }
}
