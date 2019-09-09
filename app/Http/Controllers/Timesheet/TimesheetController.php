<?php

namespace App\Http\Controllers\Timesheet;

use Illuminate\Http\Request;
use App\Services\TimesheetService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Timesheets;
use App\Http\Requests\Timesheet\CreateTimesheetRequest;
use App\Http\Requests\Timesheet\UpdateTimesheetRequest;
use App\Notifications\CreateTimesheetNotification;
use App\Http\Controllers\Controller;

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
        $numberDate = count($timesheets);

        return view('timesheets.view', ['timesheets' => $timesheets, 'numberDate' => $numberDate]);
    }

    public function viewByMonth(Request $request)
    {
        $timesheets = $this->timesheetService->viewByMonth($request);

        return view('timesheets.view', ['timesheets' => $timesheets]);
    }

    public function viewByDay(Request $request)
    {
        $timesheets = $this->timesheetService->viewByDay($request);

        return view('timesheets.view', compact('timesheets'));
    }

    public function create()
    {
        $this->authorize('create', Timesheets::class);

    	return view('timesheets.create');
    }

    public function store(CreateTimesheetRequest $request)
    {
    	if ($this->timesheetService->create($request)) {
           /* $user = \Auth::user();
            $leader = User::where('email', $user->leader)->first();
            $leader->notify(new CreateTimesheetNotification($user->name));
            $emails = \App\Models\User::find($user->id)->emails;
            foreach ($emails as $email) {
                $notification = User::where('email', $email->email)->first();
                $notification->notify(new CreateTimesheetNotification($user->name));
            }*/
    		return redirect()->route('timesheets.index')->withSuccess('Create is successfuly');
    	} else {
    		return back()->withInput()->withErrors([
    			'errorCreate' => 'Have an error while creating timesheet'
    		]);
    	}
    }

    public function show(Timesheets $timesheet)
    {
        $this->authorize('view', $timesheet);
    	$timesheet = $this->timesheetService->show($timesheet);
         
    	return view('timesheets.show', compact('timesheet'));
    }

    public function edit(Timesheets $timesheet)
    {
        $this->authorize('update', $timesheet);

    	return view('timesheets.update', ['timesheet' => $timesheet]);
    }

    public function update(UpdateTimesheetRequest $request, Timesheets $timesheet)
    {
    	if ($this->timesheetService->update($request, $timesheet)) {
    		return redirect()->route('timesheets.show', compact('timesheet'));
    	} else {
    		return back()->withInput()->withErrors([
                'errorUpdate' => 'Have an error when Updating'
            ]);
    	}
    }

    public function destroy(Timesheets $timesheet)
    {
        $this->authorize('delete', $timesheet);

        if ($this->timesheetService->delete($timesheet)) {
            return back()->withSuccess('Delete is successfuly');
        } else {
            return back()->withErrors([
                'errorDelete' => 'Have an error while deleting timesheet'
            ]);
        }
    }
}
