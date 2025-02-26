<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Customer;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::simplePaginate(15);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        if ($customers->isEmpty()) {
            return redirect()->route('customers.create')->with('warning', 'You need to create a customer first.');
        }

        return view('projects.create', compact('customers'));
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        $customers = Customer::all();

        return view('projects.edit', compact('project', 'customers'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
