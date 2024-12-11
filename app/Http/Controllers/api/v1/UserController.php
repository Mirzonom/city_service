<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{

    /**
     * Регистрация пользователя через API
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(RegisterUserRequest $request)
    {
        User::create(
            [
                'name' => $request->name,
                'login' => $request->login,
                'email' => $request->email,
                'call' => $request->call,
                'password' => Hash::make($request->password),
            ]
        );

        return response()->json(['status' => 'true'])->setStatusCode(201, "Account created.");
    }


    /**
     * Авторизация пользователя через API
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginUserRequest $request)
    {
        $user = User::where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $user->api_token = Str::random(200);
            $user->save();

            return response()
                ->json(['status' => 'true', 'user' => $user])
                ->setStatusCode(200, "Login successful.");
        } else {
            return response()
                ->json(['status' => 'false'])
                ->setStatusCode(401, "Login unsuccessful.");
        }
    }
}
