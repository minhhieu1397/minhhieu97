<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoursTimesheet;
use App\Http\Requests\HoursRequest\HoursRequest;

class HoursController extends Controller
{
    public function edit()
    {
    	return view('hours.update');
    }

    public function update(HoursRequest $request)
    {
    	$data = $request->all();
        $hours = HoursTimesheet::findOrFail(0);
        $hours->update($data);

		return back()->withSuccess( 'Update is successfully' );
    }
}
