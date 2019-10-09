<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\TimesheetService;
use App\Models\User;
use App\Models\Timesheets;
use App\Http\Controllers\Admin\BaseController;
use App\Services\Interfaces\Admin\TimesheetInterface;

class TimesheetController extends BaseController
{
    protected $timesheetInterface;

	public function __construct(TimesheetInterface $timesheetInterface)
	{
		$this->timesheetInterface = $timesheetInterface;
	}

    public function adminViewTimesheet(User $user)
    {
        $timesheets = $this->timesheetInterface->adminViewTimesheet($user);
        $numberDate = count($this->timesheetInterface->numberDateTimesheet($user));
        $countLate = count($this->timesheetInterface->showLate($user));
        $listtimesheet = [];
        $month = \Carbon\Carbon::now();
        
        foreach ($timesheets as $key => $timesheet) {
            $day = \Carbon\Carbon::createFromDate(data_get( $timesheet, 'work_date'))->format('d');
            $listtimesheet[$day] = $timesheet;
        }

        return view('admin.timesheet.viewTimesheet', ['timesheets' => $listtimesheet, 'numberDate' => $numberDate, 'countLate' => $countLate, 'user' => $user, 'month' => $month]);
    }

    public function view_by_month(Request $request, User $user)
    {   
        $timesheets = $this->timesheetInterface->view_by_month($request, $user);
        $numberDate = count($this->timesheetInterface->numberDateFindMonth($request, $user));
        $countLate = count($this->timesheetInterface->showLateFindMonth($request, $user));

        if (count($timesheets)) {
            $listtimesheet = [];
            foreach ($timesheets as $key => $timesheet) {
                $day = \Carbon\Carbon::createFromDate(data_get( $timesheet, 'work_date'))->format('d');
                $listtimesheet[$day] = $timesheet;
            }
            $month = $listtimesheet[$day]->work_date;
            return view('admin.timesheet.searchTimesheet', ['timesheets' => $listtimesheet, 'numberDate' => $numberDate, 'countLate' => $countLate, 'user' => $user, 'month' => $month]);
        } else {
            return back()->withErrors([
                'ErrorMonth' => 'Does not exist in database'
            ]);
        }
    }
}
