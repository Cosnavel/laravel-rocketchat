<?php

namespace Cosnavel\RocketChat\Service;

use Illuminate\Support\Carbon;

trait Room
{
    /**
     *
     * @param string $roomId
     * @param string $latest
     * @param string $oldest
     * @param bool $excludePinned
     * @return mixed
     */
    public function cleanRoomHistory(string $roomId, string $latest = Carbon::now(), string $oldest = Carbon::now()->subYear(), bool $excludePinned = false)
    {
        $response = $this->buildUrl('rooms.cleanHistory', 'post', ['roomId' => $roomId, 'latest' => $latest, 'oldest' => $oldest, 'excludePinned' => $excludePinned]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     *
     * @param string|null $name
     * @return mixed
     */
    public function getAllRooms(string $name = null)
    {
        $response = $this->buildUrl('rooms.adminRooms', 'get', ['filter' => $name]);

        return $this->response($response, json_decode($response->body())->rooms);
    }
}
