<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use App\Http\Requests\User\AdminUpdateUserRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
	protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(CreateUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return back()->withSuccess('Create user successfully');
        } else {
            return back()->withErrors([
                'errorCreate' => 'Have an error when creating'
            ]);
        }
    }

    public function view()
    {
        $users = $this->userService->getAll();
        
        return view('admin.user.view', compact('users'));
    }

    public function search(Request $request)
    {   
        $users = $this->userService->search($request); 

        return view('admin.user.view', compact('users'));
    }

    public function show(User $user)
    {
        $user = $this->userService->show($user);

        return view('admin.user.show', compact('user'));
    }

    public function destroy($user)
    {
        if ($this->userService->delete($user)) {
            return back()->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }

    public function edit(User $user)
    {
        return view('admin.user.update', compact('user'));
    }

    public function update(User $user, AdminUpdateUserRequest $request)
    {
        if ($this->userService->update($user, $request)) {
            return back()->withSuccess('Update is success');
        } else {
            return back()->withInput()->withErrors([
                'errorUpdate' => 'Have an error while updating'
            ]);
        }
    }

    public function resetPassword(User $user, ResetPasswordRequest $request)
    {
        if ($this->userService->resetPassword($user, $request)) {
            return back()->withSuccess('Reset Password is successfuly');
        } else {
            return back()->withErrors([
                'ResetPasswordError' => 'Have an error while Reset Password'
            ]);
        }
    }
}
