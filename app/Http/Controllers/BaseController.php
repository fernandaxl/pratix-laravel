<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\ValidationHttpException;

class BaseController extends Controller
{
  use Helpers;

  public function success($message, $statusCode = 200)
  {
    return $this->response->array([
      'success' => true,
      'message' => $message,
      'status' => $statusCode
    ])->setStatusCode($statusCode);
  }

  public function error($message, $statusCode = 200)
  {
    return $this->response->array([
      'success' => false,
      'message' => $message,
      'status' => $statusCode
    ])->setStatusCode($statusCode);
  }

  public function successData($data, $statusCode = 200)
  {
    return $this->response->array([
      'success' => true,
      'data' => $data,
      'status' => $statusCode
    ])->setStatusCode($statusCode);
  }
}
