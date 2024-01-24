<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackingStoreRequest;
use App\Http\Requests\TrackingUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Start tracking the specified resource.
     * @param TrackingStoreRequest $request
     * @param Project $project
     * @param Task $task
     */
    public function start(TrackingStoreRequest $request, Project $project, Task $task, Tracking $tracking)
    {
        $tracking->create($request->validated());

        return redirect()->route('project.show', $project)->with('success', 'Tracking started successfully.');
    }

    /**
     * Stop tracking the specified resource.
     * @param TrackingUpdateRequest $request
     * @param Project $project
     * @param Task $task
     * @param Tracking $tracking
     */
    public function stop(TrackingUpdateRequest $request, Project $project, Task $task, Tracking $tracking)
    {
        $tracking->update($request->validated());

        return redirect()->route('project.show', $project)->with('success', 'Tracking stopped successfully.');
    }
}
