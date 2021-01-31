<?php

namespace Cosnavel\RocketChat\Service;

trait Invite
{
    /**
     * @param string $roomId
     * @param string $validDays
     * @param string $maxUses
     *
     * @return mixed
     */
    public static function findOrCreateInvite(string $roomId, string $validDays, string $maxUses)
    {
        $response = (new self)->buildUrl('findOrCreateInvite', 'post', ['rid' => $roomId, 'days' => $validDays, 'maxUses' => $maxUses]);

        $decoded = json_decode($response->body());

        return (new self)->response($response, (object) ['url' => $decoded->url, 'expires' => $decoded->expires, 'success' => $decoded->success]);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public static function deleteInvite(string $id)
    {
        $response = (new self)->buildUrl('removeInvite', 'delete', ['_id' => $id]);

        return (new self)->response($response, json_decode($response->body()));
    }

    /**
     * @return mixed
     */
    public static function getInvites()
    {
        $response = (new self)->buildUrl('listInvites', 'get');

        return (new self)->response($response, json_decode($response->body()));
    }
}
