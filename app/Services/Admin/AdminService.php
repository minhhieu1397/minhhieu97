<?php
namespace App\Services\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\Admin\AdminRepository;

class AdminService
{
	protected $adminRepository;

	public function __construct(AdminRepository $adminRepository)
	{
		$this->adminRepository = $adminRepository;
	}

	public function getAll()
	{
		return $this->adminRepository->all();
	}

	public function create($request)
	{
		$user = $this->adminRepository->create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'description' => $request->input('description'),
			'role' => $request->input('role')
		]);

		return $user;
	}

	public function show($user)
	{
		return $this->adminRepository->show($user);
	}

	public function update($user, $request)
	{
		$user = $this->adminRepository->update($user, [
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'role' => $request->input('role'),
			'leader' => $request->input('leader'),
		]);

		return $user;
	}

	public function resetPassword($user, $request)
	{
		return $this->adminRepository->resetPassword($user, [
			'password' => \Hash::make($request->input('password')),
		]);
	}

	public function search($request)
	{
		$name = $request->input('search');

		return $this->adminRepository->search($name);
	}

	public function delete($user)
	{
		return $this->adminRepository->delete($user);
	}
}