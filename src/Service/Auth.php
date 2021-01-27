<?php

namespace Cosnavel\RocketChat\Service;

trait Auth
{
    public function getApiTokens(string $username, string $password)
    {
        $response = $this->buildUrl('login', 'post', ['username' => $username, 'password' => $password]);

        $decoded = json_decode($response->body());
        return $this->response($response, (object)['success' => $decoded->success, 'authToken' => $decoded->data->authToken, 'userId' => $decoded->data->userId]);
    }
}
