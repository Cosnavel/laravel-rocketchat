<?php

namespace Cosnavel\RocketChat\Service;

use Illuminate\Support\Carbon;

trait Room
{
    public function cleanRoomHistory(string $roomId, string $latest = Carbon::now(), string $oldest = Carbon::now()->subYear(), bool $excludePinned = false)
    {
        $response = $this->buildUrl('rooms.cleanHistory', 'post', ['roomId' => $roomId, 'latest' => $latest, 'oldest' => $oldest, 'excludePinned' => $excludePinned]);

        return $this->response($response, json_decode($response->body())->success);
    }

    public function getAllRooms(string $name = null)
    {
        $response = $this->buildUrl('rooms.adminRooms', 'get', ['filter' => $name]);

        return $this->response($response, json_decode($response->body())->rooms);
    }
}
