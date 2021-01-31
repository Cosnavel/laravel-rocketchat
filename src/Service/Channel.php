<?php

namespace Cosnavel\RocketChat\Service;

trait Channel
{
    /**
     * @return mixed
     */
    public static function getChannelList()
    {
        $response = (new self)->buildUrl('channels.list');

        return (new self)->response($response, json_decode($response->body())->channels);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function getChannelMembers(string $roomId)
    {
        $response = (new self)->buildUrl('channels.members', 'get', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->members);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function getChannelModerators(string $roomId)
    {
        $response = (new self)->buildUrl('channels.moderators', 'get', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->moderators);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function archiveChannel(string $roomId)
    {
        $response = (new self)->buildUrl('channels.archive', 'post', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function deleteChannel(string $roomId)
    {
        $response = (new self)->buildUrl('channels.delete', 'post', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function getChannelInfo(string $roomId)
    {
        $response = (new self)->buildUrl('channels.info', 'get', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function kickUserFromChannel(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.kick', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function addUserToChannel(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.invite', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function addChannelOwner(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.addOwner', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function removeChannelOwner(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.removeOwner', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function addChannelLeader(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.addLeader', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param string $userId
     *
     * @return mixed
     */
    public static function removeChannelLeader(string $roomId, string $userId)
    {
        $response = (new self)->buildUrl('channels.removeLeader', 'post', ['roomId' => $roomId, 'userId' => $userId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $name
     * @param array  $members
     * @param bool   $readOnly
     *
     * @return mixed
     */
    public static function createChannel(string $name, array $members = [], bool $readOnly = false)
    {
        $response = (new self)->buildUrl('channels.create', 'post', [
            'name'     => $name,
            'members'  => $members,
            'readOnly' => $readOnly,
        ]);

        return (new self)->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $name
     *
     * @return mixed
     */
    public static function renameChannel(string $roomId, string $name)
    {
        $response = (new self)->buildUrl('channels.rename', 'post', [
            'name'   => $name,
            'roomId' => $roomId,
        ]);

        return (new self)->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param bool   $readOnly
     *
     * @return mixed
     */
    public static function setChannelReadOnly(string $roomId, bool $readOnly = true)
    {
        $response = (new self)->buildUrl('channels.setReadOnly', 'post', [
            'readOnly' => $readOnly,
            'roomId'   => $roomId,
        ]);

        return (new self)->response($response, json_decode($response->body())->channel);
    }

    /**
     * @param string $roomId
     * @param string $announcement
     *
     * @return bool
     */
    public static function setChannelAnnouncement(string $roomId, string $announcement): bool
    {
        $response = (new self)->buildUrl('channels.setAnnouncement', 'post', [
            'announcement' => $announcement,
            'roomId'       => $roomId,
        ]);

        return (new self)->response($response, json_decode($response->body())->success);
    }
}
