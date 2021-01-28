<?php

namespace Cosnavel\RocketChat\Service;

trait Role
{
    /**
     * @return mixed
     */
    public function getRoles()
    {
        $response = $this->buildUrl('roles.list', 'get');

        return $this->response($response, json_decode($response->body())->roles);
    }

    /**
     * @param string $role
     * @param string $username
     *
     * @return mixed
     */
    public function addUserToRole(string $role, string $username)
    {
        $response = $this->buildUrl('roles.addUserToRole', 'post', ['roleName' => $role, 'username' => $username]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $role
     *
     * @return mixed
     */
    public function getUsersInRole(string $role)
    {
        $response = $this->buildUrl('roles.getUsersInRole', 'get', ['role' => $role]);

        return $this->response($response, json_decode($response->body())->users);
    }
}
