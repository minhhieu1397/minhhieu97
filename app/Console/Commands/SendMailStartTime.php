<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Mail;
use App\Mail\SendMailable;



class SendMailStartTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'timesheet:startcreate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            Mail::send('emails.starttime_create_timesheet', ['user' => $user], function ($mail) use ($user) {
                $mail->to($user['email'])->subject('Create Timesheet!');
            });
        }
    }
}
