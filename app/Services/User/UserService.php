<?php
namespace App\Services\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\User\UserRepository;
use App\Services\Interfaces\User\UserInterface;

class UserService implements UserInterface
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
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