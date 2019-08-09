<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\UserRepository;

class UserService
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create($request)
	{
		$user = $this->userRepository->create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'description' => $request->input('description'),
			'role' => $request->input('role')
		]);

		return $user;
	}

	public function index()
	{
		return $this->userRepository->all();
	}

	public function show($user)
	{
		return $this->userRepository->show($user);
	}

	public function update($user, $request)
	{
		$user = $this->userRepository->update($user, [
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'role' => $request->input('role'),
			'leader' => $request->input('leader'),
		]);

		return $user;
	}

	public function delete($user)
	{
		return $this->userRepository->delete($user);
	}

	public function user_update($request)
	{
		return $this->userRepository->user_update($request, [
			'description' => $request->input('description'),
		]);
	}

	public function change_password($request)
	{
        $new_password = $request->input('new_password');

		return $this->userRepository->change_password($new_password);
	}
}