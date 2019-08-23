<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\AdminService;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Models\User;

class AdminController extends Controller
{
	protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $users = $this->adminService->getAll();
        $admin = Auth::user();
        $this->authorize('adminView', $admin);

    	return view('Admin.view', ['users' => $users]);
    }

    public function create()
    {
        $user = Auth::user();
        $this->authorize('adminCreate', $user);

        return view('Admin.create');
    }

    public function store(CreateUserRequest $request)
    {
        if ($this->adminService->create($request)) {
            return redirect()->route('admins.index');
        } else {
            return back()->withInput()->withErrors([
                'errorCreareUser' => 'Have an error while creating user'
            ]);
        }
    }

    public function show(User $user)
    {
        $user = $this->adminService->show($user);
        $admin = Auth::user();
        $this->authorize('adminShow', $admin);

        return view('Admin.show',['user' => $user]);
    }

    public function edit(User $user)
    {
        $admin = Auth::user();
        $this->authorize('adminUpdate', $admin);

        return view('Admin.update', ['user' => $user]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        if ($this->adminService->update($user, $request)) {
            return back()->withSuccess('Update is success');
        } else {
            return back()->withInput()->withErrors([
                'errorUpdate' => 'Have an error while updating'
            ]);
        }
    }

    public function resetPassword(User $user, ResetPasswordRequest $request)
    {
        if ($this->adminService->resetPassword($user, $request)) {
            return back()->withSuccess('Reset Password is successfuly');
        } else {
            return back()->withErrors([
                'ResetPasswordError' => 'Have an error while Reset Password'
            ]);
        }
    }
    
    public function search(Request $request)
    {
        $users = $this->adminService->search($request); 

        return view('Admin.view', ['users' => $users]);
    }
}
