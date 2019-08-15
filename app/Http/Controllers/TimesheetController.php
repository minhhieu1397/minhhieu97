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
        
    	return view('timesheets.home',['user' => $user]);
    }

    public function view()
    {
        
        $timesheets = $this->timesheetService->index();

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function view_by_month(Request $request)
    {
        $timesheets = $this->timesheetService->view_by_month($request);

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function view_by_week(Request $request)
    {
        $timesheets = $this->timesheetService->view_by_week($request);

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
    		return Back()->withInput()->withErrors([
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
    	return view('timesheets.update', ['timesheet' => $timesheet]);
    }

    public function update(UpdateTimesheetRequest $request, Timesheets $timesheet)
    {
    	if ($this->timesheetService->update($request, $timesheet)) {
    		return redirect()->route('timesheets.index');
    	} else {
    		return Back()->withInput();
    	}
    }

    public function view_approve()
    {
        $timesheets = $this->timesheetService->view_approve();

        return view('timesheets.approve', ['timesheets' => $timesheets]);
    }

    public function edit_approve(Timesheets $timesheet)
    {
        if ($this->timesheetService->update_approve($timesheet)) {
            return Back()->withSuccess('Approve is Success');
        } else {
            return Back()->withErrors([
                'errorApprove' => 'Have an error while Approve'
            ]);
        }

    }

    public function view_timesheet(User $user)
    {
        $timesheets = $this->timesheetService->view_timesheet($user);

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function destroy($timesheet)
    {
        if ($this->timesheetService->delete($timesheet)) {
            return back()->withSuccess( 'Delete is successfuly' );
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }
 
}
