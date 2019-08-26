<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Notification\NotificationEmailService;

class NotificationEmailController extends Controller
{
	protected $notificationEmailService;

	public function __construct(NotificationEmailService $notificationEmailService)
	{
		return $this->notificationEmailService = $notificationEmailService;
	}

    public function store(Request $request, $user)
    {
    	if ($this->notificationEmailService->create($user, $request)) {
    		return back()->withSuccess('Create is successfuly');
    	} else {
    		return back()->withErrors([
    			'CreateEmaiNotification' => 'Have an error when creting notification email '
    		]);
    	}
    } 
}
