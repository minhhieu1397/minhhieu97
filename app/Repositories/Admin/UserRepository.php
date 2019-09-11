<?php

namespace App\Repositories\Admin;

use App\Models\User;

class UserRepository
{
	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	public function all()
	{
		return $this->model->all();
	}

	public function search($name)
	{
		return $this->model->where('name', $name)->get();
	}

	public function delete($user)
	{
		return $this->model->find($user)->delete();
	}

	public function update($user, $attributes)
	{
        return $this->model->find($user->id)->update($attributes);
	}

	public function resetPassword($user, $attributes)
	{
		return $this->model->find($user->id)->update($attributes);
	}
}