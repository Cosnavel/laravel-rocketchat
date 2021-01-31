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
    public function __construct()
    {
        $this->rocketChatApiBaseUrl = config('rocketchat.ROCKET_CHAT_API_BASE_URL');
        $this->rocketChatAuthToken = config('rocketchat.ROCKET_CHAT_AUTH_TOKEN');
        $this->rocketChatUserId = config('rocketchat.ROCKET_CHAT_USER_ID');
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
        if ($this->rocketChatAuthToken && $this->rocketChatUserId) {
            $this->headers = [
                'X-Auth-Token' => $this->rocketChatAuthToken,
                'X-User-Id'    => $this->rocketChatUserId,
            ];
        }

        if ($this->headers) {
            return $params ? Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path.'/', $params) : Http::withHeaders($this->headers)->$method($this->rocketChatApiBaseUrl.$path);
        }

        return $params ? Http::$method($this->rocketChatApiBaseUrl.$path.'/', $params) : Http::$method($this->rocketChatApiBaseUrl.$path);
    }

    /**
     * @param mixed $response
     * @param mixed $return
     *
     * @return mixed
     */
    private function response($response, $return)
    {
        if ($response->status() == 200) {
            return $return;
        } else {
            return json_decode($response->body())->error;
        }
    }
}
