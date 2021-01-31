<?php

namespace Cosnavel\RocketChat\Service;

trait Group
{
    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function deletePrivateChannel(string $roomId)
    {
        $response = (new self)->buildUrl('groups.delete', 'POST', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     *
     * @return mixed
     */
    public static function getPrivateChannelFiles(string $roomId)
    {
        $response = (new self)->buildUrl('groups.files', 'get', ['roomId' => $roomId]);

        return (new self)->response($response, json_decode($response->body())->files);
    }

    /**
     * @return mixed
     */
    public static function getPrivateChannels()
    {
        $response = (new self)->buildUrl('groups.listAll', 'get');

        return (new self)->response($response, json_decode($response->body())->groups);
    }

    /**
     * @param string $roomId
     * @param string $announcement
     *
     * @return bool
     */
    public static function setPrivateChannelAnnouncement(string $roomId, string $announcement): bool
    {
        $response = (new self)->buildUrl('groups.setAnnouncement', 'post', [
            'announcement' => $announcement,
            'roomId'       => $roomId,
        ]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string $roomId
     * @param bool   $readOnly
     *
     * @return mixed
     */
    public static function setPrivateChannelReadOnly(string $roomId, bool $readOnly = true)
    {
        $response = (new self)->buildUrl('groups.setReadOnly', 'post', [
            'readOnly' => $readOnly,
            'roomId'   => $roomId,
        ]);

        return (new self)->response($response, json_decode($response->body())->group);
    }
}
