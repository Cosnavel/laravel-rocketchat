<?php

namespace Cosnavel\RocketChat\Service;

trait Auth
{
    /**
     * @param string $username
     * @param string $password
     * @param bool   $setEnv
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return mixed
     */
    public function getApiTokens(string $username, string $password, bool $setEnv = false)
    {
        $response = $this->buildUrl('login', 'post', ['username' => $username, 'password' => $password]);

        $decoded = json_decode($response->body());

        $authToken = $decoded->data->authToken;
        $userId = $decoded->data->userId;

        if ($setEnv) {
            config(['rocketchat.ROCKET_CHAT_AUTH_TOKEN' => $authToken]);
            config(['rocketchat.ROCKET_CHAT_USER_ID' => $userId]);
        }

        return $this->response($response, (object) ['success' => $decoded->success, 'authToken' => $authToken, 'userId' => $userId]);
    }
}
