<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainException extends Exception
{
    public function __construct($message, $code) {
        $this->message = $message;
        $this->code = $code;
    }
    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json(array(
            'err' => array(
                'msg' => $this->message,
                'code' => $this->code
            )
        ), $this->code);
    }
}
