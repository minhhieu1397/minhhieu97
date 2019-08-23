<?php

namespace App\Repositories\Email;

use App\Models\Email;

class EmailRepository
{
	protected $model;

	public function __construct(Email $model)
	{
		$this->model =$model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}
}