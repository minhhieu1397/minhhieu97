<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Services\UserService;
use App\Models\User;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
    	return view('users.login');
    }

    public function postlogin(Request $request)
    {
    	$email = $request->input('email');
    	$password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
               if (Auth::user()->role == 'admin') {
                       return redirect()->route('users.index');
               } else {
                return redirect()->route('timesheets.index');
            }
        } else {
            return redirect()->route('users.login');
        }
    }

    public function index()
    {
        $user = Auth::user();
        $users = $this->userService->index();

    	return view('users.view', ['users' => $users]);
    }

    public function create()
    {
        $user = Auth::user();
        $this->authorize('admin',$user);

        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        if($this->userService->create($request)) {
            return redirect()->route('users.index');
        } else {
            return back()->withInput()->withErrors([
                'errorCreareUser' => 'Have an error while creating user'
            ]);
        }
    }

    public function show(User $user)
    {
        $user = $this->userService->show($user);

        $admin = Auth::user();
        $this->authorize('admin',$admin);
        return view('users.show',['user' => $user]);
    }

    public function edit(User $user)
    {
        $admin = Auth::user();
        $this->authorize('admin',$admin);
        
        return view('users.update', ['user' => $user]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        if ($this->userService->update($user, $request))
        {
            return back()->withSuccess('Update is success');
        } else {
            return back()->withInput()->withErrors([
                'errorUpdate' => 'Have an error while updating'
            ]);
        }
    }

    public function logout() 
    {
        Auth::logout();

        return redirect()->route('users.login');
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

    public function useredit(){
        return view('users.userupdate');
    }

    public function edit_user()
    {
        $user = Auth::user();

        return view('users.edit_user', ['user' => $user]);
    }

    public function update_user(UpdateRequest $request)
    {
        if($this->userService->user_update($request)) {
            return redirect()->route('timesheets.index');
        } else {
            return Back()->withInput();
        }
    }

    public function employees_edit_password()
    {
        return view('users.employees.update_password');
    }

    public function employees_update_password(ChangePasswordRequest $request)
    {
        if($this->userService->change_password($request)) {
            return redirect()->route('users.logout');
        } else {
            return Back()->withErrors([
                'errorChangePass' => 'Have an erroe while change password'
            ]);
        }
    }

    public function upload_avatar(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->file('image')->getClientOriginalName();
            if($file->move('image', $filename)) {
                $user = \Auth::user();
                $user->avatar = '/image/' . $filename;
                $user->save();
                return Back()->withSuccess( 'Upload Avatar is successfuly' );;
            } else {
                return Back();
            }
        } else {
            return Back();
        }
    }

    public function admin_resetpassword(User $user, ResetPasswordRequest $request)
    {
        if ($this->userService->admin_resetpassword($user, $request)) {
            return back()->withSuccess('Reset Password is successfuly');
        } else {
            return back()->withErrors([
                'ResetPasswordError' => 'Have an error while Reset Password'
            ]);
        }
    }

}
