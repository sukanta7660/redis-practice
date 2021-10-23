<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function showProfile()
    {
        $redis = Redis::connection();
        $redis->set('Name', 'Tailor');
    }
}
