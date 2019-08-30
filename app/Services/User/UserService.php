<?php
namespace App\Services\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\User\UserRepository;

class UserService
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create($request)
	{
		return $this->userRepository->create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'description' => $request->input('description'),
			'role' => $request->input('role')
		]);
	}

	public function getAll()
	{
		return $this->userRepository->all();
	}

	public function search($request)
	{
		$name = $request->input('search');

		return $this->userRepository->search($name);
	}

	public function show($user)
	{
		return $this->userRepository->show($user);
	}

	public function adminUpdateUser($user, $request)
	{
		$user = $this->userRepository->adminUpdateUser($user, [
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'role' => $request->input('role'),
			'leader' => $request->input('leader'),
		]);

		return $user;
	}

	public function resetPassword($user, $request)
	{
		return $this->userRepository->resetPassword($user, [
			'password' => \Hash::make($request->input('password')),
		]);
	}

	public function delete($user)
	{
		return $this->userRepository->delete($user);
	}

	public function update($request)
	{
		return $this->userRepository->update($request, [
			'description' => $request->input('description'),
		]);
	}

	public function updatePassword($request)
	{
        $new_password = $request->input('new_password');

		return $this->userRepository->updatePassword($new_password);
	}
}