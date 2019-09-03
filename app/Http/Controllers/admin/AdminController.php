<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\AdminService;

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
        dd(\Auth::guard('admins')->check());
        $admin = Auth::guard('admins')->user();
        return view('Admin.home', ['admin' => $admin]);
        /*if (count($admin)) {
            if ($admin->can('is_admin')) {
                return view('Admin.home', ['admin' => $admin]);
            } else {
                return redirect()->route('users.login');
            }
        } else {
            return redirect()->route('users.login');
        }*/
    }

    public function create()
    {
        return view('Admin.create');
    }

    public function store(CreateAdminRequest $request)
    {
        if ($this->adminService->create($request)) {
            return redirect()->route('admins.index');
        } else {
            return back()->withInput()->withErrors([
                'errorCreareUser' => 'Have an error while creating user'
            ]);
        }
    }

    public function view()
    {
        $admins = $this->adminService->getAll();

        return view('admin.view', compact('admins'));
    }

    public function show(Admins $admin)
    {
        return view('admin.show', compact('admin'));
    }

    public function edit(Admins $admin)
    {
        return view('admin.update', compact('admin'));
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
}
