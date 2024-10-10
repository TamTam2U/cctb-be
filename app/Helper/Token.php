<?php

namespace App\Helper;

use Illuminate\Http\Exceptions\HttpResponseException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class Token
{
    /**
     * @param array $data
     * 
     * @return string
     */
    public static function generate($data = [])
    {
        $factory = JWTFactory::customClaims($data);
        $payload = $factory->make();
        $token = JWTAuth::encode($payload)->get();
        return $token;
    }

    /**
     * @param string $token
     * 
     * @return \Tymon\JWTAuth\Payload
     * @throws \Tymon\JWTAuth\Exceptions\TokenExpiredException
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public static function getPayload($token)
    {
        try {
            return JWTAuth::parseToken($token)->getPayload();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            $response = response()->json([
                'status' => 401,
                'message' => 'JWT Token sudah kedaluwarsa',
            ], 401);
            throw new HttpResponseException($response);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            $response = response()->json([
                'status' => 401,
                'message' => 'JWT Token tidak valid',
            ], 401);
            throw new HttpResponseException($response);
        }
    }

}