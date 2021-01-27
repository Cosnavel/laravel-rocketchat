<?php

namespace Cosnavel\RocketChat\Service;

trait Role
{
    public function getRoles()
    {
        $response = $this->buildUrl('roles.list', 'get');

        return $this->response($response, json_decode($response->body())->roles);
    }

    public function addUserToRole(string $role, string $username)
    {
        $response = $this->buildUrl('roles.addUserToRole', 'post', ['role' => $role, 'username' => $username]);

        return $this->response($response, json_decode($response->body())->success);
    }

    public function getUsersInRole(string $role)
    {
        $response = $this->buildUrl('roles.getUsersInRole', 'get', ['role' => $role]);

        return $this->response($response, json_decode($response->body())->users);
    }
}
