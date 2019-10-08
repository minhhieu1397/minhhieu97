<?php
namespace App\Services\Admin;

use App\Services\Interfaces\AdminInterface;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\Admin\AdminRepository;

class AdminService implements AdminInterface
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
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'level' => $request->input('level')
		]);
	}

	public function update($admin, $request)
	{
		return $this->adminRepository->update($admin, [
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'level' => $request->input('level'),
		]);
	}

	public function delete($admin)
	{
		return $this->adminRepository->delete($admin);
	}
}