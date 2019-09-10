<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\TimesheetService;
use App\Models\User;
use App\Models\Timesheets;

class TimesheetController extends Controller
{
    protected $timesheetService;

	public function __construct(TimesheetService $timesheetService)
	{
		$this->timesheetService = $timesheetService;
	}

	public function viewApprove()
    {
        $timesheets = $this->timesheetService->viewApprove();

        return view('admin.timesheet.approve', ['timesheets' => $timesheets]);
    }

    public function updateApprove(Timesheets $timesheet)
    {
        if ($this->timesheetService->updateApprove($timesheet)) {
            return back()->withSuccess('Approve is Success');
        } else {
            return back()->withErrors([
                'errorApprove' => 'Have an error while Approve'
            ]);
        }
    }

    public function adminViewTimesheet(User $user)
    {
        $timesheets = $this->timesheetService->adminViewTimesheet($user);
        $numberDate = count($timesheets);
        $late = $this->timesheetService->showLate($user);
        $countLate = count($late);

        return view('admin.timesheet.viewTimesheet', ['timesheets' => $timesheets, 'numberDate' => $numberDate, 'countLate' => $countLate]);
    }
}
