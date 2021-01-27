<?php

namespace Cosnavel\RocketChat;

use Cosnavel\RocketChat\Service\Auth;
use Cosnavel\RocketChat\Service\Channel;
use Cosnavel\RocketChat\Service\Group;
use Cosnavel\RocketChat\Service\Invite;
use Cosnavel\RocketChat\Service\Misc;
use Cosnavel\RocketChat\Service\Role;
use Cosnavel\RocketChat\Service\Room;
use Cosnavel\RocketChat\Service\User;
use Illuminate\Support\Facades\Http;

class RocketChat
{
    use Auth;
    use Channel;
    use Group;
    use Invite;
    use Misc;
    use Role;
    use Room;
    use User;

    protected $rocketChatApiBaseUrl;
    protected $rocketChatAuthToken;
    protected $rocketChatUserId;

    protected $headers;

    /**
     * @param string $rocketChatApiBaseUrl
     * @param string $rocketChatAuthToken
     * @param string $rocketChatUserId
     *
     * @return void
     */
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

    /**
     * @param string $path
     * @param string $method
     * @param bool   $params
     *
     * @return mixed
     */
    private function buildUrl(string $path = '', string $method = 'get', $params = false)
    {
        if ($params) {
            return Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path.'/', $params);
        }

        return Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path);
    }

    /**
     * @param mixed $response
     * @param mixed $return
     *
     * @return mixed
     */
    private function response($response, $return)
    {
        if ($response->status() == 200 && json_decode($response->body())->success) {
            return $return;
        } else {
            return json_decode($response->body())->error;
        }
    }
}
