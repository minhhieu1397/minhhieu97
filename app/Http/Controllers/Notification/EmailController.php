<?php

namespace App\Http\Controllers\Notification;

use Illuminate\Http\Request;
use App\Models\Email;
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
    		return back();
    	}
    }
}
