<?php

namespace Cosnavel\RocketChat\Service;

trait Role
{
    /**
     * @return mixed
     */
    public static function getRoles()
    {
        $response = (new self)->buildUrl('roles.list', 'get');

        return (new self)->response($response, json_decode($response->body())->roles);
    }

    /**
     * @param string $role
     * @param string $username
     *
     * @return mixed
     */
    public static function addUserToRole(string $role, string $username)
    {
        $response = (new self)->buildUrl('roles.addUserToRole', 'post', ['roleName' => $role, 'username' => $username]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $role
     *
     * @return mixed
     */
    public static function getUsersInRole(string $role)
    {
        $response = (new self)->buildUrl('roles.getUsersInRole', 'get', ['role' => $role]);

        return (new self)->response($response, json_decode($response->body())->users);
    }
}
