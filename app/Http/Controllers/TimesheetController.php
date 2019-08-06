<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TimesheetService;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Timesheets;

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

    public function create()
    {
    	return view('timesheets.create');
    }

    public function store(Request $request)
    {
    	if ($this->timesheetService->create($request)) {
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

    	return view('timesheets.show',['timesheet' => $timesheet]);
    }

    public function edit(Timesheets $timesheet)
    {
    	return view('timesheets.update', ['timesheet' => $timesheet]);
    }

    public function update(Request $request, Timesheets $timesheet)
    {
    	if($this->timesheetService->update($request, $timesheet)) {
    		return redirect()->route('timesheets.index');
    	} else {
    		return Back()->withInput();
    	}
    }

 
}
