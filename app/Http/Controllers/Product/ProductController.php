<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Source\Modules\Product\Domain\UseCase\ProductIndexUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductShowUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductStoreUseCase;
use App\Source\Modules\Product\Infra\Dto\ProductDto;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\util\Res;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  public function __construct(private ProductRepositoryInterface $repository) {
  }

  public function index(Request $request)
  {
    return Res::json(
      ProductIndexUseCase::make($this->repository)->execute()
    );    
  }

  // public function destroy(int $id)
  // {
  //   return $this->service->destroy($id)
  //     ? $this->responseSuccess(code: Response::HTTP_NO_CONTENT)
  //     : $this->responseError(code: Response::HTTP_NOT_FOUND);
  // }

  // public function index(Request $request)
  // {
  //   return $this->responseSuccess(
  //     $this->service->index(
  //       $request->input('page'),
  //       $request->input('filter'),
  //     )
  //   );
  // }

  public function show(int $id)
  {
    return ($dto = ProductShowUseCase::make($this->repository)->execute($id))
      ? Res::json($dto)
      : Res::json(null, Response::HTTP_NOT_FOUND, true);      
    }

  public function store(ProductDto $dto)
  {
    return Res::json(
      ProductStoreUseCase::make($this->repository)->execute($dto),
      Response::HTTP_CREATED
    );
  }

  // public function update(ProductDto $dto, int $id)
  // {
  //   return $this->responseSuccess(
  //     $this->service->update($id, $dto)
  //   );
  // }
}