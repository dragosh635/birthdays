<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\BirthdayToday;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendBirthdaysNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get all the user which have their birthday today and than notify the "parent"
     *
     * @return void
     */
    public function handle()
    {
        $celebrated = User::where('birthday', 'LIKE', '%-'.date('m-d'))->get();

        $notify = [];
        foreach ($celebrated as $user) {
            $notify[$user->parent][] = $user;
        }

        foreach ($notify as $key => $contacts) {
            $user = User::find($key);

            $user->notify(new BirthdayToday($user, collect($contacts)));

            Log::info($user->fullName.' has been notified');
        }
    }
}
