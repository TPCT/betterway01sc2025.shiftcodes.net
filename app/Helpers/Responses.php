<?php

namespace App\Helpers;

class Responses
{
    public static function success($data = [], $code = 200){
        return response()->json([
            'success' => true,
            'code' => $code,
            'data' => $data
        ]);
    }

    public static function error($data = [], $code='422'){
        return response()->json([
            'success' => false,
            'code' => $code,
            'data' => $data
        ]);
    }
}