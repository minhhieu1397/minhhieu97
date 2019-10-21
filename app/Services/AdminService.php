<?php
namespace App\Services;

use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Models\Admins;

class AdminService implements AdminServiceInterface
{
	/*protected $adminRepository;
*/
	protected $model;

	public function __construct(Admins $model)
	{
		$this->model = $model;
	}

	public function getAll()
	{
		return $this->model->paginate(5);
	}

	public function create($request)
	{
		return $this->model->create([
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'password' => \Hash::make($request->input('password')),
			'level' => $request->input('level')
		]);
	}

	public function update($admin, $request)
	{
		return $this->model->find($admin->id)->update([
			'name' => ucwords(strtolower($request->input('name'))),
			'email' => $request->input('email'),
			'level' => $request->input('level'),
		]);
	}

	public function delete($admin)
	{
		return $this->model->find($admin)->delete($admin);
	}
}