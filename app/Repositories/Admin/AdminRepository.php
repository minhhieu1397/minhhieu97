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

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	public function all()
	{
		return $this->model->paginate(5);
	}

	public function update($admin, $attributes)
	{
		return $this->model->find($admin->id)->update($attributes);
	}

	public function delete($admin)
	{
		return $this->model->find($admin)->delete();
	}
}