<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\UserService;
use App\Http\Requests\User\AdminUpdateUserRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Controllers\Admin\BaseController;
use App\Services\Interfaces\Admin\UserInterface;

class UserController extends BaseController
{
	protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(CreateUserRequest $request)
    {
        if ($this->userInterface->create($request)) {
            return back()->withSuccess('Create user successfully');
        } else {
            return back()->withErrors([
                'errorCreateUser' => 'Have an error when creating'
            ]);
        }
    }

    public function view()
    {
        $users = $this->userInterface->getAll();
        
        return view('admin.user.view', compact('users'));
    }

    public function search(Request $request)
    {   
        if (count( $this->userInterface->search($request))) {
            $users = $this->userInterface->search($request); 
            return view('admin.user.view', compact('users'));
        } else {
            return back()->withErrors([
                'ErrorMonth' => 'Does not exist in database'
            ]);
        }
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function destroy($user)
    {
        if ($this->userInterface->delete($user)) {
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
        if ($this->userInterface->update($user, $request)) {
            return back()->withSuccess('Update is success');
        } else {
            return back()->withInput()->withErrors([
                'errorUpdate' => 'Have an error while updating'
            ]);
        }
    }

    public function resetPassword(User $user, ResetPasswordRequest $request)
    {
        if ($this->userInterface->resetPassword($user, $request)) {
            return back()->withSuccess('Reset Password is successfuly');
        } else {
            return back()->withErrors([
                'ResetPasswordError' => 'Have an error while Reset Password'
            ]);
        }
    }
}
