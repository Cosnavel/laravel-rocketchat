<?php

namespace Cosnavel\RocketChat\Service;

trait User
{
    /**
     * @param string $email
     * @param string $name
     * @param string $password
     * @param string $username
     * @param array  $roles
     * @param bool   $requirePasswordChange
     *
     * @return mixed
     */
    public function createUser(string $email, string $name, string $password, string $username, array $roles = ['user'], bool $requirePasswordChange = true)
    {
        $response = $this->buildUrl('users.create', 'post', ['email' => $email, 'name' => $name, 'password' => $password, 'username' => $username, 'roles' => $roles, 'requirePasswordChange' => $requirePasswordChange]);

        return $this->response($response, json_decode($response->body()));
    }

    /**
     * @param string $username
     * @param bool   $confirmRelinquish
     *
     * @return mixed
     */
    public function deleteUser(string $username, bool $confirmRelinquish = true)
    {
        $response = $this->buildUrl('users.delete', 'post', ['username' => $username, 'confirmRelinquish' => $confirmRelinquish]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @return mixed
     */
    public function getUserList()
    {
        $response = $this->buildUrl('users.list', 'get');

        return $this->response($response, json_decode($response->body())->users);
    }

    /**
     * @param string $username
     *
     * @return mixed
     */
    public function getUserInfo(string $username)
    {
        $response = $this->buildUrl('users.info', 'get', ['username' => $username]);

        return $this->response($response, json_decode($response->body())->user);
    }

    /**
     * @param string $username
     *
     * @return mixed
     */
    public function resetUserAvatar(string $username)
    {
        $response = $this->buildUrl('users.resetAvatar', 'post', ['username' => $username]);

        return $this->response($response, json_decode($response->body())->success);
    }
}
