<?php
/**
 * Created by PhpStorm.
 * User: brycemeyer
 * Date: 8/19/17
 * Time: 3:12 PM
 */

namespace Government\Http\Controllers;


use Government\Http\Requests\User\LoginRequest;
use Government\Http\Requests\User\SignUpRequest;
use Government\Models\User;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;

class AuthenticationController
{

    /**
     * @var User query builder
     */
    private $user;

    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Logs in a user
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse {

        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials);
            if (! $token ) {
                return new JsonResponse(['message' => 'invalid_credentials'], 401);
            }
            else {
                return new JsonResponse(['message' => 'Successfully Logged in!', 'token' => $token]);
            }
        } catch (JWTException $e) {
            return new JsonResponse(['message' => 'could_not_create_token'], 500);
        }
    }

    /**
     * Signs Up a user within the system
     *
     * @param SignUpRequest $request
     * @return JsonResponse
     */
    public function signUp(SignUpRequest $request) : JsonResponse {

        $existingUser = $this->user->where('email', $request->email)->first();

        if ($existingUser) {
            return new JsonResponse([
                'message' => 'Email Address already in use'
            ], 403);
        }

        $user = $this->user->create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name
        ]);

        $token = JWTAuth::fromUser($user);

        return new JsonResponse([
            'message' => 'User Successfully created!',
            'user' => $user,
            'token' => $token
        ]);

    }
}