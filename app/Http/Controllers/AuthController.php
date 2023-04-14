<?php

namespace App\Http\Controllers;

use App\Enums\ErrorType;
use App\Http\Controllers\ApiController;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends ApiController
{
    protected function getGuard($guard = 'api')
    {
        return Auth::guard($guard);
    }

    public function register(Request $request): JsonResponse
    {
        try{
            DB::beginTransaction();
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|confirmed' // password_confimation
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fails',
                    'message' => $validator->errors()->first(),
                    'errors' => $validator->errors()->toArray(),
                ]);
            }
            $user = new User([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            $user->save();

            DB::commit();
            return response()->json([
                'status' => 'success',
            ]);
        }
        catch(Exception $e)
        {
            DB::rollBack();
            throw $e;
            return [
                'success' => false,
                'code' => ErrorType::CODE_5000,
                'status_code' => ErrorType::STATUS_500,
                'message' => $e->getMessage()
            ];
        }
    }


    public function login(Request $request): JsonResponse
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {

            return response()->json([
                'status' => 'fails',
                'message' => 'Unauthorized',
                'code' => 401
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->input('remember_me')) {
            $token->expires_at = Carbon::now()->addHours(1);
        }
        $token->save();
        return response()->json([
            'status' => 'success',
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function GetAccountLogin(){
        $accountInfo = Auth::user();
        return $this->sendSuccess( $accountInfo);
    }
}