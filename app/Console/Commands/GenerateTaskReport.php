<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class GenerateTaskReport extends Command
{
    protected $signature = 'tasks:report {--project_id=}';

    protected $description = 'Generate tasks report';

    public function handle()
    {
        $projectId = $this->option('project_id');

        $tasks = Task::query();

        if ($projectId) {
            $tasks->where('project_id', $projectId);
        }

        $tasks = $tasks->get();

        $this->info('Tasks Report');

        if ($tasks->isEmpty()) {
            $this->warn('No tasks found');

            return;
        }

        $this->table(
            ['ID', 'Title', 'Status', 'Due Date'],
            $tasks->map(function ($task) {
                return [
                    $task->id,
                    $task->title,
                    $task->status,
                    $task->due_date,
                ];
            })
        );
    }
}
