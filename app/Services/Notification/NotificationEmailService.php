<?php
namespace App\Services\Notification;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Repositories\Notification\NotificationEmailRepository;

class NotificationEmailService
{
	protected $notificationEmaiRepository;

	public function __construct(NotificationEmailRepository $notificationEmaiRepository)
	{
		$this->notificationEmaiRepository = $notificationEmaiRepository;
	}

	public function create($user, $request)
	{
		$email = Email::where('email', $request->input('email'))->first();
		$emailNotification = $this->notificationEmaiRepository->create([
			'user_id' => $user->id,
			'email_id' => $email->id
		]);

		return $emailNotification;
	}

	public function delete($emailNotification)
	{
		return $this->notificationEmaiRepository->delete($emailNotification);
	}
}