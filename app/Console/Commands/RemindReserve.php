<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindReserveMail;
use App\Models\User;
use Carbon\Carbon;

class RemindReserve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:remindreserve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to user before reserve';

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
     * @return int
     */
    public function handle()
    {
        $reserve_date = Carbon::today();
        $reserves = Reserve::wheredate('start_at', $reserve_date)->get();
        foreach ($reserves as $reserve) {
            $user = User::where('id', $reserves->user_id)->find();
            $store = User::where('id', $reserves->store_id)->find();
            return Mail::to($user->email)->send(new RemindReserveMail($user, $store, $reserve));
        }
    }
}
