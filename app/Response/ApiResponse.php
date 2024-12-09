<?php

namespace App\Response;

class ApiResponse
{
    public static function jsonResponse(array $data,int $responseCode = 200): void
    {
        http_response_code(response_code: $responseCode);
        echo json_encode(value: $data);
    }
}