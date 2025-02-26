<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackingStoreRequest;
use App\Http\Requests\TrackingUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\Tracking;

class TrackingController extends Controller
{
    /**
     * Start tracking the specified resource.
     */
    public function start(TrackingStoreRequest $request, Project $project, Task $task, Tracking $tracking)
    {
        $tracking->create($request->validated());

        return redirect()->back()->with('success', 'Tracking started successfully.');
    }

    /**
     * Stop tracking the specified resource.
     */
    public function stop(TrackingUpdateRequest $request, Project $project, Task $task, Tracking $tracking)
    {
        $tracking->update($request->validated());

        return redirect()->back()->with('success', 'Tracking stopped successfully.');
    }
}
