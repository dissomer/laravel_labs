<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Support\Facades\Log;

class NotifyAssignee
{
    public function handle(TaskCreated $event): void
    {
        Log::info(
            "Notification sent to assignee for task: {$event->task->title}"
        );
    }
}
