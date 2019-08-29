<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\AdminUpdateUserRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Services\User\UserService;
use App\Models\User;
use App\Http\Controllers\Controller;
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

    public function viewUser()
    {
        $users = $this->userService->getAll();

        return view('admin.view', compact('users'));
    }

    public function search(Request $request)
    {   
        $users = $this->userService->search($request); 

        return view('admin.view', compact('users'));
    }

    public function show(User $user)
    {
        $user = $this->userService->show($user);
        /*$admin = Auth::user();
        $this->authorize('adminShow', $admin);*/

        return view('Admin.show', ['user' => $user]);
    }

    public function adminEdit(User $user)
    {
        
        
        return view('Admin.update', ['user' => $user]);
    }

    public function adminUpdateUser(User $user, AdminUpdateUserRequest $request)
    {
        if ($this->userService->adminUpdateUser($user, $request)) {
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






    /*public function edit()
    {
        $user = Auth::user();

        return view('users.edit_user', ['user' => $user]);
    }
*/
    /*public function update(UpdateRequest $request)
    {
        if ($this->userService->update($request)) {
            return redirect()->route('timesheets.index');
        } else {
            return back()->withInput();
        }
    }

    public function editPassword()
    {
        $user = Auth::user();

        return view('users.employees.update_password', ['user' => $user]);
    }

    public function updatePassword(User $user, ChangePasswordRequest $request)
    {
        if ($this->userService->updatePassword($request)) {
            return redirect()->route('logout');
        } else {
            return Back()->withErrors([
                'errorChangePass' => 'Have an error while change password'
            ]);
        }
    }

    public function editAvatar()
    {
        return view('users.user_update');
    }

    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->file('image')->getClientOriginalName();
            if ($file->move('image', $filename)) {
                $user = \Auth::user();
                $user->avatar = '/image/' . $filename;
                $user->save();
                return back()->withSuccess('Upload Avatar is successfuly');
            } else {
                return back()->withErrors([
                    'errorUpload' => 'Have an error while uploading'
                ]);
            }
        } else {
            return back()->withErrors([
                'errorUpload' => 'Have an error while uploading'
            ]);
        }
    }*/  
}
