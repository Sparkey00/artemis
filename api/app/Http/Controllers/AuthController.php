<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\ArrayShape;

class AuthController extends Controller
{
    /**
     * @param CreateUserRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function register(CreateUserRequest $request): Response|Application|ResponseFactory
    {
        $fields = $request->validated();
        try {
            DB::beginTransaction();
            $user = User::create($fields);

            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];
            DB::commit();
            $status = Status::OK->value;
        } catch (\Throwable $exception) {
            DB::rollBack();
            Log::debug($exception->getMessage());
            $response = [
                'message' => $exception->getMessage(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile()
            ];
            $status = Status::InternalServerError->value;
        }
        return response($response, $status);
    }

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], Status::Unauthorised->value);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * @param Request $request
     * @return string[]
     */
    #[ArrayShape(['message' => "string"])]
    public function logout(Request $request): array
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
