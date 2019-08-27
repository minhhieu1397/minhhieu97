<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function update($request, $attributes)
	{
		return $this->model->find(\Auth::user()->id)->update($attributes);
	}

	public function updatePassword($new_password)
	{
		$user = \Auth::user();
        $user->password = bcrypt($new_password);
        $user->save();

        return true;
	}
}