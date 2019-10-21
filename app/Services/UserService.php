<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;
use App\Models\User;

class UserService implements UserServiceInterface
{
	protected $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function create($request)
	{
		return $this->model->create([
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'description' => $request->input('description'),
			'role' => $request->input('role')
		]);
	}

	public function getAll()
	{
		return $this->model->paginate(5);
	}

	public function search($request)
	{
		$name = ucwords(strtolower($request->input('search')));

		return $this->model->where('name', $name)->get();
	}

	public function delete($user)
	{
		return $this->model->find($user)->delete();
	}
	
	public function update($user, $request)
	{
		return $this->model->find($user->id)->update([
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'role' => $request->input('role'),
			'leader' => $request->input('leader'),
		]);
	}

	public function resetPassword($user, $request)
	{
		return $this->model->find($user->id)->update([
			'password' => \Hash::make($request->input('password')),
		]);
	}

	public function updateDescription($request)
	{
		return $this->model->find(\Auth::user()->id)->update([
			'description' => $request->input('description'),
		]);
	}

	public function updatePassword($request)
	{
        $new_password = $request->input('new_password');
		$user = \Auth::user();
        $user->password = bcrypt($new_password);
        $user->save();

        return true;
	}
}