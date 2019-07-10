<?php
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', [
  'namespace' => 'App\Http\Controllers'
], function ($api) {
  $api->group(['prefix' => 'get'], function () use ($api) {
    $api->get('', 'PratixController@index');
  });
});
