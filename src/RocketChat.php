<?php

namespace Cosnavel\RocketChat;

use Cosnavel\RocketChat\Service\Channel;
use Illuminate\Support\Facades\Http;

class RocketChat
{
    use Channel;

    protected $rocketChatApiBaseUrl;
    protected $rocketChatAuthToken;
    protected $rocketChatUserId;

    protected $headers;

    public function __construct(string $rocketChatApiBaseUrl, string $rocketChatAuthToken, string $rocketChatUserId)
    {
        $this->rocketChatApiBaseUrl = $rocketChatApiBaseUrl;
        $this->rocketChatAuthToken = $rocketChatAuthToken;
        $this->rocketChatUserId = $rocketChatUserId;

        $this->headers = [
            'X-Auth-Token' => $this->rocketChatAuthToken,
            'X-User-Id'    => $this->rocketChatUserId,
        ];
    }

    private function buildUrl(string $path = '', string $method = 'get', $params = false)
    {
        if ($params) {
            return Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path.'/', $params);
        }

        return Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path);
    }

    private function response($response, $return)
    {
        if ($response->status() == 200 && json_decode($response->body())->success) {
            return $return;
        } else {
            return json_decode($response->body())->error;
        }
    }

    // public static function __callStatic($method, $args)
    // {
    //     var_dump($method);
    //     // return $method($args);
    // }
}
