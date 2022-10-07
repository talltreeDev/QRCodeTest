<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\JWTManager as JWT;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Interfaces\AuthRepositoryInterface;


class UserController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository){
        $this->authRepository = $authRepository;
    }

    public function register(Request $request){
        $data = $this->authRepository->register($request);
        if($data['success']) {
            return response()->json($data['result'], 201);
        } else {
            return response()->json($data['result'], 400);
        }
        
    }

    public function login(Request $request){
        $data = $this->authRepository->login($request);
        if($data['success']) {
            return response()->json($data['result'], 201);
        } else {
            return response()->json($data['result'], 400);
        }
    }
}