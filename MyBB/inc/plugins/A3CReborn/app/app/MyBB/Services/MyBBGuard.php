<?php

namespace App\MyBB\Services;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;

class MyBBGuard implements Guard
{
    use GuardHelpers;

    /**
     * Session parameter name;
     */
    const MYBB_USER_COOKIE_NAME = 'mybbuser';

    /**
     * MyBBGuard constructor.
     * @param UserProvider $provider
     */
    public function __construct(UserProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @inheritDoc
     */
    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }

        $authCookie = $_COOKIE[self::MYBB_USER_COOKIE_NAME] ?? null;

        if($authCookie) {
            list($id, $token) = explode('_', $authCookie);

            /**
             * We get user from db using id stored in cookie
             */
            $user = $this->provider->retrieveById($id);

            /**
             * We check that remember token from cookie matches the one stored in db
             */
            if($user->getRememberToken() == $token) {
                $this->user = $user;
            }

            return $this->user;
        }
    }

    /**
     * @inheritDoc
     */
    public function validate(array $credentials = [])
    {
        /**
         * We do not allow to authenticate directly in the plugin application
         */
        return false;
    }
}
