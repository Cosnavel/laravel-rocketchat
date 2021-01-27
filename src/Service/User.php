<?php

namespace Cosnavel\RocketChat\Service;

trait User
{
    public function createUser(string $email, string $name, string $password, sting $username, array $roles = ['user'], bool $requirePasswordChange = true)
    {
        $response = $this->buildUrl('users.create', 'post', ['email' => $email, 'name' => $name, 'password' => $password, 'username' => $username, 'roles' => $roles, 'requirePasswordChange' => $requirePasswordChange]);

        return $this->response($response, json_decode($response->body()));
    }

    public function deleteUser(string $username, bool $confirmRelinquish = true)
    {
        $response = $this->buildUrl('users.delete', 'post', ['username' => $username, 'confirmRelinquish' => $confirmRelinquish]);

        return $this->response($response, json_decode($response->body())->success);
    }

    public function getUserList()
    {
        $response = $this->buildUrl('users.list', 'get');

        return $this->response($response, json_decode($response->body())->users);
    }

    public function getUserInfo(string $username)
    {
        $response = $this->buildUrl('users.info', 'get', ['username' => $username]);

        return $this->response($response, json_decode($response->body())->user);
    }

    public function resetUserAvatar(string $username)
    {
        $response = $this->buildUrl('users.resetAvatar', 'post', ['username' => $username]);

        return $this->response($response, json_decode($response->body())->success);
    }
}
