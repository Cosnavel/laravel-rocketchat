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
    public static function createUser(string $email, string $name, string $password, string $username, array $roles = ['user'], bool $requirePasswordChange = true)
    {
        $response = (new self)->buildUrl('users.create', 'post', ['email' => $email, 'name' => $name, 'password' => $password, 'username' => $username, 'roles' => $roles, 'requirePasswordChange' => $requirePasswordChange]);

        return (new self)->response($response, json_decode($response->body()));
    }

    /**
     * @param string $username
     * @param bool   $confirmRelinquish
     *
     * @return mixed
     */
    public static function deleteUser(string $username, bool $confirmRelinquish = true)
    {
        $response = (new self)->buildUrl('users.delete', 'post', ['username' => $username, 'confirmRelinquish' => $confirmRelinquish]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @return mixed
     */
    public static function getUserList()
    {
        $response = (new self)->buildUrl('users.list', 'get');

        return (new self)->response($response, json_decode($response->body())->users);
    }

    /**
     * @param string $username
     *
     * @return mixed
     */
    public static function getUserInfo(string $username)
    {
        $response = (new self)->buildUrl('users.info', 'get', ['username' => $username]);

        return (new self)->response($response, json_decode($response->body())->user);
    }

    /**
     * @param string $username
     *
     * @return mixed
     */
    public static function resetUserAvatar(string $username)
    {
        $response = (new self)->buildUrl('users.resetAvatar', 'post', ['username' => $username]);

        return (new self)->response($response, json_decode($response->body())->success);
    }
}
