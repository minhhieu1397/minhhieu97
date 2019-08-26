<?php

namespace App\Repositories\Notification;

use App\Models\EmailNotification;

class NotificationEmailRepository
{
	protected $model;

	public function __construct(EmailNotification $model)
	{
		$this->model =$model;
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}
}