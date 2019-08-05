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
		/*if ($request->hasFile('image')) {
               $image = $request->file('file');
               $filename = time() . '.' . $image->getClientOriginalExtension();
               $location = public_path('image/' . $filename);
               Image::make($file)->resize(800, 400)->save($location);
        }
		$user = \Auth::user();
		$user->avatar = $filename;
		$user->save();*/
		return $this->model->find(\Auth::user()->id)->update($attributes);
	}

}