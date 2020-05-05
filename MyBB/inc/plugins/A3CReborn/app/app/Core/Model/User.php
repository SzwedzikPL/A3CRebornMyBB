<?php

namespace App\Core\Model;

use App\Badge\Model\BadgeManager;
use App\Badge\Model\HasBadge;
use App\Badge\Model\HasBadgeTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasBadge, BadgeManager
{
    use Notifiable;
    use HasBadgeTrait;

    /**
     * @var string
     */
    protected $table = 'mybb_users';

    /**
     * @var string
     */
    protected $connection = 'mysql_no_prefix';

    /**
     * @var string
     */
    protected $primaryKey = 'uid';

    /**
     * @var string
     */
    protected $rememberTokenName = 'loginkey';

    /**
     * Determine whether user is administrator
     * #TODO: Implement checking, currently returns value for development purposes
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return true;
    }
}
