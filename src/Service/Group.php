<?php

namespace Cosnavel\RocketChat\Service;

trait Group
{
    public function deletePrivateChannel(string $roomId)
    {
        $response = $this->buildUrl('groups.delete', 'POST', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->success);
    }

    public function getPrivateChannelFiles(string $roomId)
    {
        $response = $this->buildUrl('groups.files', 'get', ['roomId' => $roomId]);

        return $this->response($response, json_decode($response->body())->files);
    }
    public function getPrivateChannels()
    {
        $response = $this->buildUrl('groups.listAll', 'get');

        return $this->response($response, json_decode($response->body())->groups);
    }

    public function setPrivateChannelAnnouncement(string $roomId, string $announcement):bool
    {
        $response = $this->buildUrl('groups.setAnnouncement', 'post', [
            'announcement' => $announcement,
            'roomId'   => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->success);
    }

    public function setPrivateChannelReadOnly(string $roomId, bool $readOnly = true)
    {
        $response = $this->buildUrl('groups.setReadOnly', 'post', [
            'readOnly' => $readOnly,
            'roomId'   => $roomId,
        ]);

        return $this->response($response, json_decode($response->body())->group);
    }
}
