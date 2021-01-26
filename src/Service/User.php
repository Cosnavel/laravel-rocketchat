<?php

namespace Cosnavel\RocketChat\Service;

trait Channel
{
    /**
     * @return mixed
     */
    public function getChannelList()
    {
        $response = $this->buildUrl('channels.list');

        return $this->response($response, json_decode($response->body())->channels);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public function getChannelMembers(string $roomId)
    {
        $response = $this->buildUrl('channels.members', 'get', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->members);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public function getChannelModerators(string $roomId)
    {
        $response = $this->buildUrl('channels.moderators', 'get', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->moderators);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public function archiveChannel(string $roomId)
    {
        $response = $this->buildUrl('channels.archive', 'post', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public function deleteChannel(string $roomId)
    {
        $response = $this->buildUrl('channels.delete', 'post', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public function getChannelInfo(string $roomId)
    {
        $response = $this->buildUrl('channels.info', 'get', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function kickUserFromChannel(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.kick', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }
    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function addUserToChannel(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.invite', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function addChannelOwner(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.addOwner', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function removeChannelOwner(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.removeOwner', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function addChannelLeader(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.addLeader', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public function removeChannelLeader(string $roomId, string $userId)
    {
        $response = $this->buildUrl('channels.removeLeader', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $name
     * @param array  $members
     * @param bool   $readOnly
     *
     * @return mixed
     */
    public function createChannel(string $name, array $members = [], bool $readOnly = false)
    {
        $response = $this->buildUrl('channels.create', 'post', [
            'name'     => $name,
            'members'  => $members,
            'readOnly' => $readOnly,
        ]);

        return $this->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $name
     *
     * @return mixed
     */
    public function renameChannel(string $roomId, string $name)
    {
        $response = $this->buildUrl('channels.rename', 'post', [
            'name'   => $name,
            'roomId' => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param bool   $readOnly
     *
     * @return mixed
     */
    public function setChannelReadOnly(string $roomId, bool $readOnly = true)
    {
        $response = $this->buildUrl('channels.setReadOnly', 'post', [
            'readOnly' => $readOnly,
            'roomId'   => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->channel);
    }
}
