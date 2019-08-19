<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TimesheetService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Timesheets;
use App\Http\Requests\Timesheet\CreateTimesheetRequest;
use App\Http\Requests\Timesheet\UpdateTimesheetRequest;
use App\Notifications\CreateTimesheetNotification;

class TimesheetController extends Controller
{
	protected $timesheetService;

	public function __construct(TimesheetService $timesheetService)
	{
		$this->timesheetService = $timesheetService;
	}

    public function index()
    {
        $user = Auth::user();

    	return view('timesheets.home', ['user' => $user]);
    }

    public function view()
    {
        $timesheets = $this->timesheetService->getAll();

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function viewByMonth(Request $request)
    {
        $timesheets = $this->timesheetService->viewByMonth($request);

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function viewByDay(Request $request)
    {
        $timesheets = $this->timesheetService->viewByDay($request);

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function create()
    {
    	return view('timesheets.create');
    }

    public function store(CreateTimesheetRequest $request)
    {
    	if ($this->timesheetService->create($request)) {
            /*$user = \Auth::user();
            $leader = User::where('email', $user->leader)->first();
            $leader->notify(new CreateTimesheetNotification($user->name));*/
    		return redirect()->route('timesheets.index')->withSuccess('Create is successfuly');
    	} else {
    		return back()->withInput()->withErrors([
    			'errorCreate' => 'Have an error while creating timesheet'
    		]);
    	}
    }

    public function show(Timesheets $timesheet)
    {
    	$timesheet = $this->timesheetService->show($timesheet);
        $this->authorize('view', $timesheet);
         
    	return view('timesheets.show',['timesheet' => $timesheet]);
    }

    public function edit(Timesheets $timesheet)
    {
        $this->authorize('update', $timesheet);

    	return view('timesheets.update', ['timesheet' => $timesheet]);
    }

    public function update(UpdateTimesheetRequest $request, Timesheets $timesheet)
    {
    	if ($this->timesheetService->update($request, $timesheet)) {
    		return redirect()->route('timesheets.index');
    	} else {
    		return back()->withInput();
    	}
    }

    public function viewApprove()
    {
        $timesheets = $this->timesheetService->viewApprove();

        return view('timesheets.approve', ['timesheets' => $timesheets]);
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

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function destroy($timesheet)
    {
        if ($this->timesheetService->delete($timesheet)) {
            return back()->withSuccess('Delete is successfuly');
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }
}
