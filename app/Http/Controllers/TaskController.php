<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Project $project
     */
    public function create(Project $project)
    {
        $users = User::all();
        $statuses = TaskStatusEnum::cases();

        return view('tasks.create', compact('project', 'users', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param TaskStoreRequest $request
     * @param Project $project
     */
    public function store(TaskStoreRequest $request, Project $project, Task $task)
    {
        $task->create($request->validated());

        return redirect()->route('project.show', $project)->with('success', 'Task created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @param Task $task
     */
    public function edit(Project $project, Task $task)
    {
        $users = User::all();
        $statuses = TaskStatusEnum::cases();

        return view('tasks.edit', compact('project', 'task', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     * @param TaskUpdateRequest $request
     * @param Project $project
     * @param Task $task
     */
    public function update(TaskUpdateRequest $request, Project $project, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('project.show', $project)->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param Project $project
     * @param Task $task
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('project.show', $project)->with('success', 'Task deleted successfully');
    }
}
