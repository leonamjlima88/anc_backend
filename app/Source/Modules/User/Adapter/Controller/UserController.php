<?php

namespace App\Source\Modules\User\Adapter\Controller;

use App\Source\Modules\User\Domain\UseCase\UserDestroyUseCase;
use App\Source\Modules\User\Domain\UseCase\UserIndexUseCase;
use App\Source\Modules\User\Domain\UseCase\UserShowUseCase;
use App\Source\Modules\User\Domain\UseCase\UserStoreUseCase;
use App\Source\Modules\User\Domain\UseCase\UserUpdateUseCase;
use App\Source\Modules\User\Adapter\Dto\UserDto;
use App\Source\Modules\User\Port\Repository\UserRepositoryInterface;
use App\Source\Shared\Adapter\Controller\Controller;
use App\Source\Shared\util\Res;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
  public function __construct(private UserRepositoryInterface $repository) {
  }

  public function destroy(int $id)
  {
    return UserDestroyUseCase::make($this->repository)->execute($id) 
      ? Res::success(code: Response::HTTP_NO_CONTENT)
      : Res::error(code: Response::HTTP_NOT_FOUND);
  }

  public function index(Request $request)
  {
    return Res::success(
      UserIndexUseCase::make($this->repository)->execute()
    );
  }

  public function show(int $id)
  {
    return ($dto = UserShowUseCase::make($this->repository)->execute($id))
      ? Res::success($dto)
      : Res::error(code: Response::HTTP_NOT_FOUND);
  }

  public function store(UserDto $dto)
  {
    return Res::success(
      UserStoreUseCase::make($this->repository)->execute($dto),
      Response::HTTP_CREATED
  );
  }

  public function update(UserDto $dto, int $id)
  {
    return Res::success(
      UserUpdateUseCase::make($this->repository)->execute($dto, $id)
    );    
  }
}