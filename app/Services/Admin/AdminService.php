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
		return $this->adminRepository->create([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'level' => $request->input('level')
		]);
	}

	/*

	

	

	public function search($request)
	{
		$name = $request->input('search');

		return $this->adminRepository->search($name);
	}

	public function delete($user)
	{
		return $this->adminRepository->delete($user);
	}*/
}