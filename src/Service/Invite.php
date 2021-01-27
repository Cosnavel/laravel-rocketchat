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
    public function findOrCreateInvite(string $roomId, string $validDays, string $maxUses)
    {
        $response = $this->buildUrl('findOrCreateInvite', 'post', ['rid' => $roomId, 'days' => $validDays, 'maxUses' => $maxUses]);

        $decoded = json_decode($response->body());

        return $this->response($response, (object) ['url' => $decoded->url, 'expires' => $decoded->expires, 'success' => $decoded->success]);
    }

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function deleteInvite(string $id)
    {
        $response = $this->buildUrl('removeInvite', 'delete', ['_id' => $id]);

        return $this->response($response, json_decode($response->body()));
    }

    /**
     * @return mixed
     */
    public function getInvites()
    {
        $response = $this->buildUrl('listInvites', 'get');

        return $this->response($response, json_decode($response->body()));
    }
}
