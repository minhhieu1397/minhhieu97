<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Interfaces\TimesheetServiceInterface;
use App\Models\Timesheets;

class TimesheetService implements TimesheetServiceInterface
{
	protected $model;

	public function __construct(Timesheets $model)
	{
		$this->model = $model;
	}

	public function getTimesheetByUser($user)
	{
		return $this->model->orderBy('work_date', 'desc')
			->whereMonth('work_date', \Carbon\Carbon::now()->month)
			->where('user_id', $user->id)->get();
	}

	public function getTimesheetByMonth($request, $user)
	{
		$month = $request->input('month');
		$year = \Carbon\Carbon::now()->year;

		return $this->model->orderBy('work_date', 'desc')
			->whereMonth('work_date', $month)
			->whereYear('work_date', $year)
			->where('user_id', $user->id)->get();
	}

	public function showLate($user)
	{
		return $this->model->orderBy('work_date', 'desc')
			->whereMonth('work_date', \Carbon\Carbon::now()->month)
			->where('user_id', $user->id)
			->where('late_flg', true)->get();
	}

	public function numberDateTimesheet($user)
	{
		$month = \Carbon\Carbon::now()->month;
		$year = \Carbon\Carbon::now()->year;

		return $this->model->whereMonth('work_date', $month)
			->whereYear('work_date', $year)
			->Where('user_id', $user->id)
			->get();
	}

	public function showLateFindMonth($request, $user)
	{
		$month = $request->input('month');

		return $this->model->orderBy('work_date', 'desc')
			->whereMonth('work_date', $month)
			->where('user_id', $user->id)
			->where('late_flg', true)
			->get();
	}

	public function numberDateFindMonth($request, $user)
	{
		$month = $request->input('month');

		return $this->model->orderBy('work_date', 'desc')
			->whereMonth('work_date', $month)
			->where('user_id', $user->id)
			->get();
	}

	public function getAll()
	{
		return $this->model->all()->where('user_id', \Auth::user()->id);
	}







	public function viewByMonth($request)
	{
		$month = $request->input('month');

		return $this->model->whereMonth('work_date', $month)->Where('user_id', \Auth::user()->id)->get();
	}

	public function viewByDay($request)
	{
		$date = $request->input('date');

		return $this->model->whereDate('work_date', $date )->Where('user_id', \Auth::user()->id)->get();
	}

	public function create($request)
	{
		$now = \Carbon\Carbon::now();
        $workDate = \Carbon\Carbon::parse($request->input('work_date'))->hour(17);
        $lateFlg = $now->diffInSeconds($workDate, false) < 0;

        return $this->model->create([
        	'name' => \Auth::user()->name,
            'work_date' => $request->input('work_date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'details' => $request->input('details'),
            'issue' => $request->input('issue'),
            'intention' => $request->input('intention'),
            'approve' => false,
            'late_flg' => $lateFlg,
            'leader' => \Auth::user()->leader,
            'user_id' => \Auth::user()->id
        ]);
	}

	public function update($request, $timesheet)
	{
		$attributes = $request->all();
      
        return $this->model->find($timesheet->id)->update([
        	'approve' => false,
        	'details' => $request->input('details'),
        	'issue' => $request->input('issue'),
        	'intention' => $request->input('intention'),
        ]);
	}

	public function delete($timesheet)
	{
		return $this->model->find($timesheet->id)->delete();
	}

	public function viewApprove()
	{
		return $this->model->where('leader', \Auth::user()->email)->where('approve', 0)->get();
	}

	public function updateApprove($timesheet)
	{
		return $this->model->find($timesheet->id)->update([
			'approve' => true,
		]);
	}
}