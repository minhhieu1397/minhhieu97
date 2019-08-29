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
        /*$this->authorize('adminView', $admin);*/
        $admin = Auth::guard('admins')->user();

    	return view('Admin.home', ['admin' => $admin]);
    }

    public function create()
    {
        /*$user = Auth::admins();
        $this->authorize('adminCreate', $user);*/
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

    

    /*

    

    

    
    
    public function search(Request $request)
    {
        $users = $this->adminService->search($request); 

        return view('Admin.view', ['users' => $users]);
    }

    public function destroy($user)
    {
        if ($this->adminService->delete($user)) {
            return back()->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }*/
}
