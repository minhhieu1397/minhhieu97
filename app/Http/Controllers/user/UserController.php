<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Services\User\UserService;
use App\Models\User;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function destroy($user)
    {
        if ($this->userService->delete($user)) {
            return redirect()->route('users.index')->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }

    public function edit(User $user)
    {
        $this->authorize('userUpdate', $user);
        
        return view('users.edit_user', ['user' => $user]);
    }

    public function update(UpdateRequest $request)
    {
        if($this->userService->update($request)) {
            return redirect()->route('timesheets.index');
        } else {
            return back()->withInput();
        }
    }

    public function editPassword(User $user)
    {
        $this->authorize('userUpdate', $user);

        return view('users.employees.update_password', ['user' => $user]);
    }

    public function updatePassword(User $user, ChangePasswordRequest $request)
    {
        if ($this->userService->updatePassword($user, $request)) {
            return redirect()->route('users.logout');
        } else {
            return Back()->withErrors([
                'errorChangePass' => 'Have an error while change password'
            ]);
        }
    }

    public function editAvatar()
    {
        return view('users.userupdate');
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
    }  
}
