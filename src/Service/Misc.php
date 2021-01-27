<?php

namespace Cosnavel\RocketChat\Service;

trait Misc
{
    public function getStatistics(bool $refresh = true)
    {
        $response = $this->buildUrl('statistics', 'get', ['refresh' => $refresh]);

        return $this->response($response, json_decode($response->body()));
    }
}
