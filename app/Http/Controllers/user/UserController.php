<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Services\User\UserService;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseController;

class UserController extends BaseController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function editAvatar()
    {
        $user = Auth::user();
        return view('users.user_update', compact('user'));
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

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit_user', ['user' => $user]);
    }

    public function update(UpdateRequest $request)
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

    public function personal()
    {
        $user = Auth::user();
        
        return view('users.personal', compact('user'));
    }

    public function logout() 
    {
        Auth::logout();

        return redirect()->route('timesheet.login');
    }
}
