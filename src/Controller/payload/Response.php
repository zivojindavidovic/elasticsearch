<?php

namespace Controller\payload;

class Response
{
    const VALUE_ERROR_CODE_500 = 'Bad Request';
    public function make($data)
    {
        return json_encode($data);
    }

    public function makeError($errorCode)
    {
        return json_encode([
            'success' => false,
            'errorCode' => match ($errorCode) {
                'error_code_500' => self::VALUE_ERROR_CODE_500
            }
        ]);
    }
}