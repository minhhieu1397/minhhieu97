<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Admin\AdminService;
use App\Services\Interfaces\AdminServiceInterface;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Image\UploadImageRequest;
use App\Models\User;
use App\Models\Admins;
use App\Http\Controllers\Admin\BaseController;

class AdminController extends BaseController
{
	protected $adminInterface;

    public function __construct(AdminServiceInterface $adminInterface)
    {
        $this->adminInterface = $adminInterface;
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.home', compact('admin'));
    }

    public function create()
    {
        return view('admin.admin.create');     
    }

    public function store(CreateAdminRequest $request)
    {
        if ($this->adminInterface->create($request)) {
            return redirect()->route('admins.index');
        } else {
            return back()->withInput()->withErrors([
                'errorCreareUser' => 'Have an error while creating user'
            ]);
        }
    }

    public function view()
    {
        $admins = $this->adminInterface->getAll();
        
        return view('admin.admin.view', compact('admins'));
    }

    public function show(Admins $admin)
    {
        return view('admin.admin.show', compact('admin'));
    }

    public function edit(Admins $admin)
    {
        return view('admin.admin.update', compact('admin'));
    }

    public function update(Admins $admin, Request $request)
    {
        if ($this->adminInterface->update($admin, $request)) {
            return redirect()->route('admins.show', compact('admin'))->withSuccess('Update is successfuly');
        } else {
            return back()->withInput()->withErrors([
                'ErrorUpdate' => 'Have an error when updating'
            ]);
        }
    }

    public function destroy($admin)
    {
        if ($this->adminInterface->delete($admin)) {
            return back()->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }

    public function logout() 
    {
        Auth::guard('admin')->logout();

        return redirect()->route('timesheet.login');
    }

    public function editAvatar()
    {
        $admin = Auth::guard('admin')->user();
   
        return view('admin.admin.upload_avatar', compact('admin'));
    }

    public function updateAvatar(UploadImageRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->file('image')->getClientOriginalName();
            if ($file->move('imageAdmin', $filename)) {
                $admin = Auth::guard('admin')->user();
                $admin->avatar = '/imageAdmin/' . $filename;
                $admin->save();
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