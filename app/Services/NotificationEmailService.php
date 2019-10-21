<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\EmailNotification;

class NotificationEmailService
{
	protected $model;

	public function __construct(EmailNotification $model)
	{
		$this->model = $model;
	}

	public function create($user, $request)
	{
		$email = Email::where('email', $request->input('email'))->first();

		return $this->model->create([
			'user_id' => $user->id,
			'email_id' => $email->id
		]);
	}

	public function delete($emailNotification)
	{
		return $this->model->find($emailNotification->id)->delete();
	}
}