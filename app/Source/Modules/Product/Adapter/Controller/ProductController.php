<?php

namespace App\Source\Modules\Product\Adapter\Controller;

use App\Source\Modules\Product\Domain\UseCase\ProductDestroyUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductIndexUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductShowUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductStoreUseCase;
use App\Source\Modules\Product\Domain\UseCase\ProductUpdateUseCase;
use App\Source\Modules\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\Controller\Controller;
use App\Source\Shared\util\Res;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  public function __construct(private ProductRepositoryInterface $repository) {
  }

  public function index(Request $request)
  {
    return Res::success(
      ProductIndexUseCase::make($this->repository)->execute()
    );
  }

  public function destroy(int $id)
  {
    return ProductDestroyUseCase::make($this->repository)->execute($id) 
      ? Res::success(code: Response::HTTP_NO_CONTENT)
      : Res::error(code: Response::HTTP_NOT_FOUND);
  }

  public function show(int $id)
  {
    return ($dto = ProductShowUseCase::make($this->repository)->execute($id))
      ? Res::success($dto)
      : Res::error(code: Response::HTTP_NOT_FOUND);  
  }

  public function store(ProductDto $dto)
  {
    return Res::success(
      ProductStoreUseCase::make($this->repository)->execute($dto),
      Response::HTTP_CREATED
  );
  }

  public function update(ProductDto $dto, int $id)
  {
    return Res::success(
      ProductUpdateUseCase::make($this->repository)->execute($dto, $id)
    );    
  }
}