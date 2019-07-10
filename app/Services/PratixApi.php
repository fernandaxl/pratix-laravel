<?php

namespace App\Services;

use GuzzleHttp\Client as Guzzle;


class PratixApi
{
  public function get()
  {
    $guzzle = new Guzzle;
    try {
      $response = $guzzle->get(env('PRATIX_API'));
      return json_decode($response->getBody());
    } catch (\Throwable $th) {
      dd($th->getMessage());
    }
  }
}
