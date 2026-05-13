<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Events\TaskCreated;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:new,in_progress,done',
            'project_id' => 'required|exists:projects,id',
            'author_id' => 'required|exists:users,id',
            'assigned_to' => 'nullable|exists:users,id',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validated);

        event(new TaskCreated($task));

        return $task;
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|in:new,in_progress,done',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}
