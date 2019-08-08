<?php

namespace App\Repositories;

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

	public function show($user)
	{
		return $this->model->all()->where('id', $user->id);
	}

	public function update($user, $attributes)
	{
        return $this->model->find($user->id)->update($attributes);
	}

	public function delete($user)
	{
		return $this->model->find($user)->delete();
	}

	public function user_update($request, $attributes)
	{
		return $this->model->find(\Auth::user()->id)->update($attributes);
	}

	public function change_password($new_password)
	{
		$user = \Auth::user();
        $user->password = bcrypt($new_password);
        $user->save();

        return true;
	}

}