<?php

namespace App\Http\Controllers;

use App\Notifications\TestNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function sendNotification(){
        $user = User::first();
        $details = [
             'greetings' => 'Hi Dear X',
             'body' => 'This is the test notification message to you',
             'actionText' => 'See my test project',
             'actionURL' => url('/'),
            //  'mail_address' => 'abirahmed4808@gmail.com',
             'order_id' => 510
        ];

        Notification::send($user, new TestNotification($details));
        dd('Notification Send');
}
}
