<?php

namespace App\Traits;

trait ResponseTrait
{
    public function showResponse($input = [], $code = 200)
    {
        $response = [
            'status' => 'success',
            'message' => 'The request has been done successfully.',
            'response' => $input
        ];

        if (isset($input['status'], $input['message'], $input['response'])) {
            $response = $input;
        }

        $input_temp = $response;
        $input_temp['status_code'] = $code;


        if (env('APP_ENV') == 'PRODUCTION') {
            unset($response['response']['exception']);
        }

        if (!in_array($code, [200, 422, 401, 403, 402]) && request()->method() != 'GET') {
            $response['message'] = 'internal server error';
            $code = 500;
        }

        return response($response, $code);
    }

}
