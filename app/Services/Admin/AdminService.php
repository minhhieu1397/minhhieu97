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

	public function update($admin, $request)
	{
		return $this->adminRepository->update($admin, [
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'level' => $request->input('level'),
		]);
	}

	public function delete($admin)
	{
		return $this->adminRepository->delete($admin);
	}
}