<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class CreateTaskInteractive extends Command
{
    protected $signature = 'tasks:create-interactive';

    protected $description = 'Create task interactively';

    public function handle()
    {
        $title = $this->ask('Enter task title');

        $description = $this->ask(
            'Short description (optional)'
        );

        $dueDate = $this->ask(
            'Due date (YYYY-MM-DD)'
        );

        $status = $this->choice(
            'Choose status',
            ['new', 'in_progress', 'done'],
            0
        );

        $assignedTo = $this->ask(
            'Assignee ID (or leave empty)'
        );

        $projectId = $this->ask('Project ID');

        $authorId = $this->ask('Author ID');

        if (!$this->confirm('Create this task?', true)) {
            return;
        }

        $task = Task::create([
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'project_id' => $projectId,
            'author_id' => $authorId,
            'assigned_to' => $assignedTo ?: null,
            'due_date' => $dueDate,
        ]);

        $this->info(
            "Task '{$task->title}' created with ID: {$task->id}"
        );
    }
}
