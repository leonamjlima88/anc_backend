<?php

use App\Source\Modules\Stock\Product\Adapter\Controller\ProductController;
use Illuminate\Support\Facades\Route;

$group = [
  'middleware' => [ 'X-Locale' ],
  'prefix' => 'stock'
];

if (env('AUTH')) array_push($group['middleware'], env('AUTH'));

/**
 * Product (Estoque)
 */
Route::group($group, function () {
  Route::get("product",         [ProductController::class, 'index'])->name("stock-product.index");
  Route::post("product",        [ProductController::class, 'store'])->name("stock-product.store");
  Route::get("product/{id}",    [ProductController::class, 'show'])->name("stock-product.show");
  Route::put("product/{id}",    [ProductController::class, 'update'])->name("stock-product.update");
  Route::delete("product/{id}", [ProductController::class, 'destroy'])->name("stock-product.destroy");
  Route::post("product/query",  [ProductController::class, 'query'])->name("stock-product.query");
});