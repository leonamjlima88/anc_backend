<?php

namespace App\Source\Modules\Stock\Product\Adapter\Controller;

use App\Source\Modules\Stock\Product\Adapter\Dto\ProductDto;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductDestroyUseCase;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductIndexUseCase;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductQueryUseCase;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductShowUseCase;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductStoreUseCase;
use App\Source\Modules\Stock\Product\Adapter\UseCase\ProductUpdateUseCase;
use App\Source\Modules\Stock\Product\Port\Repository\ProductRepositoryInterface;
use App\Source\Shared\Adapter\Controller\Controller;
use App\Source\Shared\Adapter\Dto\PageFilter\PageFilterDto;
use App\Source\Shared\util\Res;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  public function __construct(private ProductRepositoryInterface $repository) {
  }

  public function destroy(int $id)
  {
    return ProductDestroyUseCase::make($this->repository)->execute($id) 
      ? Res::success(code: Response::HTTP_NO_CONTENT)
      : Res::error(code: Response::HTTP_NOT_FOUND);
  }

  public function index()
  {
    $data = ProductIndexUseCase::make($this->repository)->execute();
    return Res::success($data);
  }

  public function show(int $id)
  {
    return ($dto = ProductShowUseCase::make($this->repository)->execute($id))
      ? Res::success($dto)
      : Res::error(code: Response::HTTP_NOT_FOUND);
  }

  public function store(ProductDto $dto)
  {
    $data = ProductStoreUseCase::make($this->repository)->execute($dto);
    return Res::success($data, Response::HTTP_CREATED);
  }

  public function update(ProductDto $dto, int $id)
  {
    $data = ProductUpdateUseCase::make($this->repository)->execute($dto, $id);
    return Res::success($data);
  }

  public function query(PageFilterDto $dto)
  {
    $data = ProductQueryUseCase::make($this->repository)->execute($dto);
    return Res::success($data);
  }
}