<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Timesheets;
use DB;

class CheckDateTimesheetRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (count(DB::table('timesheets')->where('work_date', $value)->where('user_id', \Auth::user()->id)->get())) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can not create with this date';
    }
}
