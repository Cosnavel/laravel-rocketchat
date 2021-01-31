<?php

namespace Cosnavel\RocketChat\Service;

trait Room
{
    /**
     * @param string $roomId
     * @param string $latest
     * @param string $oldest
     * @param bool   $excludePinned
     *
     * @return mixed
     */
    public static function cleanRoomHistory(string $roomId, string $latest = null, string $oldest = null, bool $excludePinned = false)
    {
        $latest = $latest ?? now()->toDateTimeString();
        $oldest = $oldest ?? now()->subYear()->toDateTimeString();

        $response = (new self)->buildUrl('rooms.cleanHistory', 'post', ['roomId' => $roomId, 'latest' => $latest, 'oldest' => $oldest, 'excludePinned' => $excludePinned]);

        return (new self)->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string|null $name
     *
     * @return mixed
     */
    public static function getAllRooms(string $name = null)
    {
        $response = (new self)->buildUrl('rooms.adminRooms', 'get', ['filter' => $name]);

        return (new self)->response($response, json_decode($response->body())->rooms);
    }
}
