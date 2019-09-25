<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\TimesheetService;
use App\Models\User;
use App\Models\Timesheets;
use App\Http\Controllers\Admin\BaseController;

class TimesheetController extends BaseController
{
    protected $timesheetService;

	public function __construct(TimesheetService $timesheetService)
	{
		$this->timesheetService = $timesheetService;
	}

    public function adminViewTimesheet(User $user)
    {
        $timesheets = $this->timesheetService->adminViewTimesheet($user);
        $numberDate = count($this->timesheetService->numberDateTimesheet($user));
        $countLate = count($this->timesheetService->showLate($user));

        return view('admin.timesheet.viewTimesheet', ['timesheets' => $timesheets, 'numberDate' => $numberDate, 'countLate' => $countLate, 'user' => $user]);
    }

    public function view_by_month(Request $request, User $user)
    {   
        if (count($this->timesheetService->view_by_month($request, $user))) {
            $timesheets = $this->timesheetService->view_by_month($request, $user);
            $numberDate = count($this->timesheetService->numberDateFindMonth($request, $user));
            $countLate = count($this->timesheetService->showLateFindMonth($request, $user));
        } else {
            return back()->withErrors([
                'ErrorMonth' => 'Does not exist in database'
            ]);
        }
        
        return view('admin.timesheet.viewTimesheet', ['timesheets' => $timesheets, 'numberDate' => $numberDate, 'countLate' => $countLate, 'user' => $user]);
    }
}
