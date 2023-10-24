<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class PushNotificationController extends Controller
{
    public function sendNotification(Request $request)
    {
				$deviceToken = env('DEVICE_TOKEN');

        $message = CloudMessage::withTarget('token', $deviceToken)
            ->withNotification(Notification::create('Order Delivered!', 'Notification message'));

        $messaging = app('firebase.messaging');

        $messaging->send($message);

        return response()->json(['message' => 'Notification sent']);
    }
}
