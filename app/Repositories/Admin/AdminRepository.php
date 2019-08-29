<?php

namespace App\Repositories\Admin;

use App\Models\Admins;

class AdminRepository
{
	protected $model;

	public function __construct(Admins $model)
	{
		$this->model = $model;
	}

/*	public function all()
	{
		return $this->model->paginate(7);
	}*/

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}
}