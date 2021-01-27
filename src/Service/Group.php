<?php

namespace Cosnavel\RocketChat\Service;

trait Group
{
    /**
     *
     * @param string $roomId
     * @return mixed
     */
    public function deletePrivateChannel(string $roomId)
    {
        $response = $this->buildUrl('groups.delete', 'POST', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     *
     * @param string $roomId
     * @return mixed
     */
    public function getPrivateChannelFiles(string $roomId)
    {
        $response = $this->buildUrl('groups.files', 'get', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->files);
    }

    /**
     *
     * @return mixed
     */
    public function getPrivateChannels()
    {
        $response = $this->buildUrl('groups.listAll', 'get');

        return $this->response($response, json_decode($response->body())->groups);
    }

    /**
     *
     * @param string $roomId
     * @param string $announcement
     * @return bool
     */
    public function setPrivateChannelAnnouncement(string $roomId, string $announcement): bool
    {
        $response = $this->buildUrl('groups.setAnnouncement', 'post', [
            'announcement' => $announcement,
            'roomId'       => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->success);
    }

    /**
     *
     * @param string $roomId
     * @param bool $readOnly
     * @return mixed
     */
    public function setPrivateChannelReadOnly(string $roomId, bool $readOnly = true)
    {
        $response = $this->buildUrl('groups.setReadOnly', 'post', [
            'readOnly' => $readOnly,
            'roomId'   => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->group);
    }
}
