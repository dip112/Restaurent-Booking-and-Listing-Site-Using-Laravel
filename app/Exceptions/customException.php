<?php

namespace App\Exceptions;
use Throwable;
use Exception;

class customException extends Exception
{
    //
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof CustomException) {
            // Handle the CustomException here
            return response()->view('errors.custom', [], 500);
        }

        return parent::render($request, $exception);
    }
}
