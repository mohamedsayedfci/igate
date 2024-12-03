<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class PARANTAPI extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function expectsJson()
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        // $data['field'] = $validator->errors()->keys()[0];
        $data['status'] = 422;
        $data['success'] = false;
        $data['message'] = $validator->errors();

        throw new HttpResponseException(response()->json($data, JsonResponse::HTTP_UNPROCESSABLE_ENTITY)); // 422
    }
}
