<?php

namespace App\Source\Shared\Domain\Exception;

use Exception;
use Illuminate\Http\Response;

/**
 * Erro na validação dos dados. Validação customizada.
 */
class EntityNotFoundException extends Exception
{
    protected mixed $errorResult;
    protected int $errorCode = 0;

    public function __construct(mixed $errorResult = 'Entity not found!', int $errorCode = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        $this->errorResult = $errorResult;
        $this->errorCode = $errorCode;
    }

    /**
     * Retorna erros da exceção
     *
     * @return mixed
     */
    public function errors(): mixed
    {
        return $this->errorResult;
    }

    /**
     * retorna status code da exceção
     *
     * @return int
     */
    public function status(): int
    {
        return $this->errorCode;
    }
    
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response('...');
    }
}
