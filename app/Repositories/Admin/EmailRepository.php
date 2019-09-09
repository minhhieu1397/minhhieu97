<?php

namespace App\Repositories\Admin;

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

	public function delete($email)
	{
		return $this->model->find($email)->delete();
	}

	public function show($add)
	{
		return $this->model->all()->where('id', $add);
	}
}