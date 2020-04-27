<?php

namespace App\Core\Http\Controllers;

use App\Core\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __invoke()
    {
        return new UserResource(Auth::user());
    }
}
