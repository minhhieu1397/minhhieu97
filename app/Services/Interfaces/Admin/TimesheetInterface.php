<?php
namespace App\Services\Interfaces\Admin;

interface TimesheetInterface 
{
	public function adminViewTimesheet($user);

	public function view_by_month($request, $user);

	public function showLate($user);

	public function numberDateTimesheet($user);

	public function showLateFindMonth($request, $user);
	
	public function numberDateFindMonth($request, $user);
}