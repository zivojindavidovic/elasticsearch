<?php

namespace Controller\payload;

class Request
{
    protected array $get = [];
    protected array $post = [];

    public function get()
    {
        return $_GET;
    }

    public function post()
    {
        return json_decode(file_get_contents('php://input'), true);
    }

    public function getAll()
    {
        $this->get = $_GET;
        $this->post = json_decode(file_get_contents('php://input'), true);

        return array_merge($this->get, $this->post);
    }
}