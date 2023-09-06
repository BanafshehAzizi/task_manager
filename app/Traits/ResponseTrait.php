<?php

namespace App\Traits;

trait ResponseTrait
{
    public function showResponse($input = [], $code = 200)
    {
        $response = [
            'status' => 'success',
            'message' => __('messages.public.success'),
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
            $response['message'] = __('messages.public.error.internal_server_error');
            $code = 500;
        }

        return response($response, $code);
    }

}
