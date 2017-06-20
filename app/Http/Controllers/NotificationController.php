<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notifications.index', [
            'user' => Auth::user()
        ]);
    }

    public function show($notification_id)
    {
        $notification = DatabaseNotification::find($notification_id);
        $notification->markAsRead();

        return redirect(\Request::query('redirect_url'));
    }
}
