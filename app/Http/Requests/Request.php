<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        return response()->json([
            'message' => 'errors',
            'data' => $errors
        ]);
    }  
}