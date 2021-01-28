<?php

namespace Cosnavel\RocketChat\Service;

trait Auth
{
    /**
     *
     * @param string $username
     * @param string $password
     * @param bool $setEnv
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getApiTokens(string $username, string $password, bool $setEnv = false)
    {
        $response = $this->buildUrl('login', 'post', ['username' => $username, 'password' => $password]);

        $decoded = json_decode($response->body());

        $authToken = null;
        $userId = null;
        if (isset($decoded->data)) {
            $authToken = $decoded->data->authToken;
            $userId = $decoded->data->userId;
        }

        if ($setEnv) {
            config(['rocketchat.ROCKET_CHAT_AUTH_TOKEN' => $authToken]);
            config(['rocketchat.ROCKET_CHAT_USER_ID' => $userId]);
        }

        return $this->response($response, (object) ['status' => $decoded->status, 'authToken' => $authToken, 'userId' => $userId]);
    }
}
