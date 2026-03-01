<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function apiResponseFormat(
        string $success,
        $data,
        string $message,
        string $timestamp,
        int $status_code
    ): JsonResponse {
        
        // 1. Validation
        if (!in_array($success, ['success', 'error', 'fail'], true)) {
            throw new \InvalidArgumentException('Invalid success status.');
        }

        if (trim($message) === '') {
            throw new \InvalidArgumentException('A short human readable message is required');
        }

        if (!in_array($status_code, [200, 201, 202, 204, 400, 401, 403, 404, 405, 409, 500], true)) {
            throw new \InvalidArgumentException('Invalid HTTP status code.');
        }

        // 2. Response
        return response()->json([
            'success'     => $success,
            'data'        => $data,
            'message'     => $message,
            'timestamp'   => $timestamp,
            // (microtime(true) - LARAVEL_START) captures the entire request duration
            'time_in_ms'  => round((microtime(true) - LARAVEL_START) * 1000, 2),
            'status_code' => $status_code
        ], $status_code);
    }
}