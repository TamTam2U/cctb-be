<?php

namespace App\Helper;

class ValidationErrorResponse{
    /**
     * @param \Illuminate\Validation\Validator $validator
     * 
     * @return \Illuminate\Http\Response
     */
    public static function generate($validator){
        $errors = [];
        foreach ($validator->errors()->toArray() as $index => $value) {
            $errors[] = [
                'property' => $index,
                'message' => $value[0],
            ];
        }
        $response = response()->json([
            'status' => 400,
            'message' => 'Validasi Gagal',
            'errors' => $errors
        ], 400);
        return $response;
    }
}