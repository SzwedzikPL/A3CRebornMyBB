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
    protected $primaryKey = 'uid';

    /**
     * @var string
     */
    protected $rememberTokenName = 'loginkey';
}
