<?php

namespace Controller\v1;

use Controller\payload\Request;
use Controller\payload\Response;

abstract class AbstractController
{
    protected const KEY_ERROR_CODE_500 = 'error_code_500';
    public function __construct(readonly Request $request, readonly Response $response)
    {
    }
}