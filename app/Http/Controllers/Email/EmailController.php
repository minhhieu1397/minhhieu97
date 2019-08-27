<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\User;
use App\Models\EmailNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Email\EmailService;
use App\Http\Requests\Notification\CreateEmailRequest;

class EmailController extends Controller
{
	protected $emailService;

	public function __construct(EmailService $emailService)
	{
		$this->emailService = $emailService;
	}

    public function index()
    {
    	$emails = $this->emailService->getAll();

    	return view('NotificationEmails.index', ['emails' => $emails]);
    }

    public function store(CreateEmailRequest $request)
    {
    	if ($this->emailService->create($request)) {
    		return back()->withSuccess('Create is successfuly ');
    	} else {
    		return back()->withErrors([
    			'ErrorEmail' => 'Have an error when create NotificationEmail'
    		]);
    	}
    }

    public function show(User $user)
    {
    	$emails = \App\Models\User::find($user->id)->emails;
        
    	return view('NotificationEmails.show', ['emails' => $emails, 'user' => $user]);
    }

    public function destroy($email)
    {
    	if ($this->emailService->delete($email)) {
    		return back()->withSuccess('Delete is successfuly');
    	} else {
    		return back()->withErrors([
    			'ErrorDeleteEmail' => 'Have an error when delete Email'
    		]);
    	}
    }
}
