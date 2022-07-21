<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  // public function __construct(
  //   protected ProductService $service
  // ) {
  // }

  public function index(Request $request)
  {
    return 'ProductController->index()';
  }


  // public function destroy(int $id): JsonResponse
  // {
  //   return $this->service->destroy($id)
  //     ? $this->responseSuccess(code: Response::HTTP_NO_CONTENT)
  //     : $this->responseError(code: Response::HTTP_NOT_FOUND);
  // }

  // public function index(Request $request): JsonResponse
  // {
  //   return $this->responseSuccess(
  //     $this->service->index(
  //       $request->input('page'),
  //       $request->input('filter'),
  //     )
  //   );
  // }

  // public function show(int $id): JsonResponse
  // {
  //   return ($dto = $this->service->show($id))
  //     ? $this->responseSuccess($dto)
  //     : $this->responseError(code: Response::HTTP_NOT_FOUND);
  // }

  // public function store(ProductDto $dto): JsonResponse
  // {
  //   return $this->responseSuccess(
  //     $this->service->store($dto),
  //     Response::HTTP_CREATED
  //   );
  // }

  // public function update(ProductDto $dto, int $id): JsonResponse
  // {
  //   return $this->responseSuccess(
  //     $this->service->update($id, $dto)
  //   );
  // }
}