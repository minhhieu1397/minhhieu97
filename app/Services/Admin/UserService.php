<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Repositories\Admin\UserRepository;

class UserService
{
	protected $userRepository;

	public function create($request)
	{
		return $this->userRepository->create([
			'name' => ucwords(strtolower($request->input('name'))),
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
		$name = ucwords(strtolower($request->input('search')));

		return $this->userRepository->search($name);
	}

	public function show($user)
	{
		return $this->userRepository->show($user);
	}

	public function delete($user)
	{
		return $this->userRepository->delete($user);
	}
	
	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function update($user, $request)
	{
		return $this->userRepository->update($user, [
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'role' => $request->input('role'),
			'leader' => $request->input('leader'),
		]);
	}

	public function resetPassword($user, $request)
	{
		return $this->userRepository->resetPassword($user, [
			'password' => \Hash::make($request->input('password')),
		]);
	}
}