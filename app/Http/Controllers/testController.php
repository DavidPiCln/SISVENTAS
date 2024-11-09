<?php

namespace App\Http\Controllers;

use App\Events\TestWebsocket;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(){
        event(new TestWebsocket);
    }
}
