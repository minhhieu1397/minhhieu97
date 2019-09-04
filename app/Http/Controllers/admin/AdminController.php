<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\AdminService;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Models\User;
use App\Models\Admins;

class AdminController extends Controller
{
	protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        if (Auth::guard('admins')->check()) {
            $admin = Auth::guard('admins')->user();
            return view('Admin.home', ['admin' => $admin]);
        } else {
            return redirect()->route('users.login');
        }
    }

    public function create()
    {
        if (Auth::guard('admins')->check()) {
            return view('Admin.create');
        } else {
            return redirect()->route('users.login');
        }   
    }

    public function store(CreateAdminRequest $request)
    {
        $admin = Auth::guard('admins')->user();
        if ($admin->level == '1') {
            if ($this->adminService->create($request)) {
                return redirect()->route('admins.index');
            } else {
                return back()->withInput()->withErrors([
                    'errorCreareUser' => 'Have an error while creating user'
                ]);
            }
        } else {
            return back()->withInput();
        }
    }

    public function view()
    {
        if (Auth::guard('admins')->check()) {
            $admins = $this->adminService->getAll();
            return view('admin.view', compact('admins'));
        } else {
            return redirect()->route('users.login');
        }  
    }

    public function show(Admins $admin)
    {
        if (Auth::guard('admins')->check()) {
            return view('admin.show', compact('admin'));
        } else {
            return redirect()->route('users.login');
        }
    }

    public function edit(Admins $admin)
    {
        if (Auth::guard('admins')->check()) {
            return view('admin.update', compact('admin'));
        } else {
            return redirect()->route('users.login');
        }
    }

    public function update(Admins $admin, Request $request)
    {
        if ($this->adminService->update($admin, $request)) {
            return redirect()->route('admins.show', compact('admin'))->withSuccess('Update is successfuly');
        } else { 
            return back()->withInput()->withErrors([
                'ErrorUpdate' => 'Have an error when updating'
            ]);
        }
    }

    public function destroy($admin)
    {
        if ($this->adminService->delete($admin)) {
            return back()->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }

    public function logout() 
    {
        Auth::guard('admins')->logout();

        return redirect()->route('users.login');
    }
}
