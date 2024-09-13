<?php

namespace Controller\v1;

class UserController extends AbstractController
{
    public function save()
    {
        $data = $this->request->getAll();
        $userId = $data['user_id'];

        $user = User::get($userId);

        if ($user) {
            $user::update($data);
        } else {
            $user::create($data);
        }

        $result = null;

        if ($result) {

            return $this->response->make($result);
        }

        return $this->response->makeError(static::KEY_ERROR_CODE_500);
    }
}