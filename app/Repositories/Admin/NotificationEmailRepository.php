<?php

namespace App\Repositories\Admin;

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

	public function delete($emailNotification)
	{
		return $this->model->find($emailNotification->id)->delete();
	}
}