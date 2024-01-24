<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tracking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openTasks = Task::openTasksFromCurrentUser()->get();
        $openTrackings = Tracking::openTrackings()->get();

        return view('dashboard', compact('openTasks', 'openTrackings'));
    }
}
