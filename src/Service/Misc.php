<?php

namespace Cosnavel\RocketChat\Service;

trait Misc
{
    /**
     * @param bool $refresh
     *
     * @return mixed
     */
    public static function getStatistics(bool $refresh = true)
    {
        $response = (new self)->buildUrl('statistics', 'get', ['refresh' => $refresh]);

        return (new self)->response($response, json_decode($response->body()));
    }
}
