<?php

namespace App\Listeners;

use App\Events\ClassCancelled;
use App\Mail\ClassCancelledMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyClassCancelled
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCancelled $event): void
    {
        $members = $event->scheduledClass->members();

        $className = $event->scheduledClass->classType->name;
        $classDateTime = $event->scheduledClass->date_time;
        // Log::info($event);

        $details = compact('className', 'classDateTime');

        $members->each(function($user) use ($details) {
            Mail::to($user)->send(new ClassCancelledMail($details));
        });
    }
}
