<?php

namespace App\Repositories\Admin;

use App\Models\User;

class AdminRepository
{
	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function all()
	{
		return $this->model->paginate(7);
	}

	public function create($attributes)
	{
		return $this->model->create($attributes);
	}

	public function show($user)
	{
		return $this->model->all()->where('id', $user->id);
	}

	public function update($user, $attributes)
	{
        return $this->model->find($user->id)->update($attributes);
	}

	public function resetPassword($user, $attributes)
	{
		return $this->model->find($user->id)->update($attributes);
	}

	public function search($name)
	{
		return $this->model->where('name', $name)->paginate(7);
	}
		public function delete($user)
	{
		return $this->model->find($user)->delete();
	}
}