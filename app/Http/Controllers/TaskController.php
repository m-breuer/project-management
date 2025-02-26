<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create(Project $project)
    {
        $users = User::all();
        $statuses = TaskStatusEnum::cases();

        return view('tasks.create', compact('project', 'users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request, Project $project, Task $task)
    {
        $task->create($request->validated());

        return redirect()->route('projects.show', $project)->with('success', 'Task created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Task $task)
    {
        $users = User::all();
        $statuses = TaskStatusEnum::cases();

        return view('tasks.edit', compact('project', 'task', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Project $project, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('projects.show', $project)->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('projects.show', $project)->with('success', 'Task deleted successfully');
    }
}
