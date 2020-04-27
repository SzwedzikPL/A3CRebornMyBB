<?php

namespace App\Core\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
