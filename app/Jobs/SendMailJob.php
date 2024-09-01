<?php

namespace App\Jobs;

use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Queueable, InteractsWithQueue, SerializesModels;

    public Application $application;
    public function __construct($application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $manager = User::first();

        Mail::to($manager)->send(new ApplicationCreated($this->application));
    }
}
