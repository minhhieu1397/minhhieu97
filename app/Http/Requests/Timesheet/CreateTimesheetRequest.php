<?php

namespace App\Http\Requests\Timesheet;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckDateTimesheetRule;

class CreateTimesheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'work_date' => ['required', 'date', 'before:tomorrow', new CheckDateTimesheetRule()],       
            'start_time' => 'required',
            'end_time' => 'required',
            'details' => 'required',
        ];
    }
}
