<?php

use Illuminate\Support\Facades\Route;

/**
 * User (Usuário)
 */
Route::group([
  // 'middleware' => [
  //   'api', 
  //   InitializeTenancyByDomain::class, 
  //   PreventAccessFromCentralDomains::class,
  //   'jwt',
  //   'acl',
  //   'X-Locale'
  // ],
  'namespace' => 'App\Source\Modules\User\Adapter\Controller'
  // 'prefix' => 'stock',
], function () {
  Route::get("/user",         "UserController@index")->name("user.index");
  Route::post("/user",        "UserController@store")->name("user.store");
  Route::get("/user/{id}",    "UserController@show")->name("user.show");
  Route::put("/user/{id}",    "UserController@update")->name("user.update");
  Route::delete("/user/{id}", "UserController@destroy")->name("user.destroy");
});