<?php

namespace App\Helper;

class Response
{
    /**
     * @param array $data
     * @param string|null $message
     * @param int $statusCode
     * 
     * @return \Illuminate\Http\Response
     */
    public static function success($data = [], $message = null, $statusCode = 200)
    {
        $res = [
            'statusCode' => $statusCode,
            'data' => $data
        ];
        if ($message) {
            $res['message'] = $message;
        }

        return response()->json($res, $statusCode);
    }

    /**
     * @param string|null $message
     * @param int $statusCode
     * @param array $errors
     * 
     * @return \Illuminate\Http\Response
     */
    public static function error($message = null,$statusCode = 422, $errors = [])
    {
        $res = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        if ($message) {
            $res['errors'] = $errors;
        }

        return response()->json($res, $statusCode);
    }
}