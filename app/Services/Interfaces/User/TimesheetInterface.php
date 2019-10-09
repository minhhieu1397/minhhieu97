<?php
namespace App\Services\Interfaces\User;

interface TimesheetInterface 
{
	public function getAll();

	public function viewByMonth($request);

	public function viewByDay($request);

	public function create($request);

	public function update($request, $timesheet);

	public function delete($timesheet);

	public function viewApprove();

	public function updateApprove($timesheet);
}