<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\NotificationEmailService;
use App\Http\Requests\Notification\NotificationEmailRequest;
use App\Http\Controllers\Admin\BaseController;

class NotificationEmailController extends BaseController
{
	protected $notificationEmailService;

	public function __construct(NotificationEmailService $notificationEmailService)
	{
		return $this->notificationEmailService = $notificationEmailService;
	}

    public function store(NotificationEmailRequest $request, User $user)
    {
    	if ($this->notificationEmailService->create($user, $request)) {
    		return back()->withSuccess('Create is successfuly!');
    	} else {
    		return back()->withErrors([
    			'CreateEmaiNotification' => 'Have an error when creting notification email'
    		]);
    	}
    }

    public function destroy($userId, $emailId)
    {
        $emailNotification = EmailNotification::where('user_id', $userId)->where('email_id', $emailId)->first();
        if ($this->notificationEmailService->delete($emailNotification)) {
            return back()->withSuccess('Delete is successfuly');
        } else {
            return back()->withErrors([
                'ErrorDelete' => 'Have an error when delete email'
            ]);
        }
    }
}
