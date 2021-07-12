<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function notifications(){

        //mark all unread users notification

        auth()->user()->unreadNotifications->markAsRead();

        //display users notification
        

        return view('user.notification', [
            'notifications'=> auth()->user()->notifications
        ]);

    }
}
