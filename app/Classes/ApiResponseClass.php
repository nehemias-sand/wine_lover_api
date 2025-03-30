<?php

namespace App\Classes;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiResponseClass
{
    public static function rollback($e, $message = "Something went wrong! Process not completed")
    {
        DB::rollBack();
        self::throwException($e, $message);
    }

    public static function throwException($e, $message = "Something went wrong! Process not completed")
    {
        self::logError($e);

        throw new HttpResponseException(
            response()->json(['message' => $message], Response::HTTP_INTERNAL_SERVER_ERROR)
        );
    }

    public static function sendResponse($result = null, $message = null, $code = Response::HTTP_OK)
    {
        // (2xx)
        if (self::isSuccessCode($code)) {
            return self::handleSuccessResponse($result, $message, $code);
        }

        // (4xx)
        if (self::isClientErrorCode($code)) {
            return self::handleClientErrorResponse($message, $code);
        }

        // (500)
        self::throwException(
            new Exception($message ?? "Unexpected error with status code: $code."),
            $message ?? "Unexpected error with status code: $code."
        );
    }

    private static function logError($e)
    {
        if ($e instanceof \Throwable) {
            Log::error(sprintf(
                "Error: %s in %s on line %d",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            ));
        } else {
            Log::error($e);
        }
    }

    private static function handleSuccessResponse($result, $message, $code)
    {
        if ($result) {
            // Verificamos si es una instancia de paginación o colección de recursos
            if ($result instanceof LengthAwarePaginator || $result instanceof ResourceCollection) {
                return $result->response()->setStatusCode($code);
            }
            return response()->json(['data' => $result], $code);
        }

        if ($message) {
            return response()->json(['message' => $message], $code);
        }

        return response()->noContent();
    }

    private static function handleClientErrorResponse($message, $code)
    {
        if ($message) {
            return response()->json(['message' => $message], $code);
        }

        self::throwException(
            new Exception('A message is required for 4xx errors.'),
            'A message is required for 4xx errors.'
        );
    }

    private static function isSuccessCode($code)
    {
        return $code >= Response::HTTP_OK && $code < Response::HTTP_MULTIPLE_CHOICES;
    }

    private static function isClientErrorCode($code)
    {
        return $code >= Response::HTTP_BAD_REQUEST && $code < Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}
