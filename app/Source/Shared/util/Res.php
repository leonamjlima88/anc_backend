<?php

namespace App\Source\Shared\util;

use Illuminate\Http\JsonResponse;

final class Res
{
  private function __construct(
    public $data = [],
    public int $code,
    public bool $error,
    public mixed $message,
    public mixed $additional,
  ){}

  public static function json(
    $data = [], 
    int $code = 200, 
    bool $error = false, 
    mixed $message = 'success', 
    mixed $additional = null
  ): JsonResponse {
    return response()->json(
      new Res($data, $code, $error, $message, $additional), 
      $code
    );
  }    
}