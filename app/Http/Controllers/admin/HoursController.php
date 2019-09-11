<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\HoursTimesheet;
use App\Http\Requests\HoursRequest\HoursRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\BaseController;
use DB;

class HoursController extends BaseController
{
    public function edit()
    {
        $hour = DB::table('hourstimesheet')->first();

    	return view('hours.update', compact('hour'));
    }

    public function update(HoursRequest $request)
    {
    	$data = $request->all();
        $hours = HoursTimesheet::findOrFail(0);
        $hours->update($data);

		return back()->withSuccess( 'Update is successfully' );
    }
}
