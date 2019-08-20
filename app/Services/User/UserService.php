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