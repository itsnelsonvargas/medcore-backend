<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponse;

    public function login(Request $request, AuthService $authService)
    {
        $startTime = microtime(true);

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Call the service
        $result = $authService->authenticate(
            $request->email,
            $request->password
        );

        return $this->apiResponseFormat(
            'success',
            $result,
            'Logged in successfully',
            $startTime,
            200
        );
    }
}