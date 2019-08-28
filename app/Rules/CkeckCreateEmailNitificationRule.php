<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
use App\Models\Email;

class CkeckCreateEmailNitificationRule implements Rule
{
    public $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        if (count(DB::table('email')->where('email', $value)->first())) {
            $email = DB::table('email')->where('email', $value)->first();
            if (count(DB::table('email_notification')->where('email_id', $email->id)->where('user_id', $this->user->id)->get())) {
                return false;
            } else {
                return true;
            }
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
        return 'Cannot create with this email';
    }
}
