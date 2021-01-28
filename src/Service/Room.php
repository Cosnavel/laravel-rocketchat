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
    public function cleanRoomHistory(string $roomId, string $latest = null, string $oldest = null, bool $excludePinned = false)
    {
        $latest = $latest ?? now()->toDateTimeString();
        $oldest = $oldest ?? now()->subYear()->toDateTimeString();

        $response = $this->buildUrl('rooms.cleanHistory', 'post', ['roomId' => $roomId, 'latest' => $latest, 'oldest' => $oldest, 'excludePinned' => $excludePinned]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     * @param string|null $name
     *
     * @return mixed
     */
    public function getAllRooms(string $name = null)
    {
        $response = $this->buildUrl('rooms.adminRooms', 'get', ['filter' => $name]);

        return $this->response($response, json_decode($response->body())->rooms);
    }
}
