<?php

namespace App\Http\Controllers;

use App\Services\PratixApi;
use App\Http\Controllers\BaseController;

class PratixController extends BaseController
{
  public function index()
  {
    $result = (new PratixApi)->get();

    if ($result->status != 200 || $result->error || !$result = $result->data) {
      return $this->error('error on get results');
    }

    $filtereds = [];
    foreach ($result as $i) { # poderia ser usado um transformer para modificar os items, mas, como são poucos a modificar, achei mais adequado usar um foreach();
      if (isset($i->payments->name)) $i->payments->name = 'Profissional ' . $i->payments->name;

      if ($i->atuacao) $i->atuacao->total_de_servicos = sizeof($i->atuacao->servicos);
      $filtereds[] = $i;
    }
    return $this->successData($filtereds);
  }
}
