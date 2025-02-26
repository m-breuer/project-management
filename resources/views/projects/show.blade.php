@extends('layouts.app')

@section('heading')
    <h1>{{ $project->name }}</h1>
    <small class="ps-2">({{ $project->customer->company_name }})</small>

    <div class="btn-group ms-auto">
        <a href="{{ route('projects.edit', $project) }}" target="_self" class="btn btn-dark">{{ __('Edit') }}</a>
        <a href="{{ route('projects.tasks.create', $project) }}" target="_self" class="btn btn-dark">{{ __('Add Task') }}</a>
    </div>
@endsection

@section('content')
    <div id="pm__project_description">
        {{ $project->description }}
    </div>

    <div id="pm__project_tasks">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Deadline') }}</th>
                        <th scope="col">{{ __('Expenditure') }}</th>
                        <th scope="col">{{ __('Time spent') }}</th>
                        <th scope="col">{{ __('Signed to') }}</th>
                        <th scope="col">{{ __('Created by') }}</th>
                        <th scope="col"><span class="visually-hidden">{{ __('Tools') }}</span></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($project->tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                {{ $task->status->name }}
                            </td>
                            <td>{{ $task->deadline !== null ? $task->deadline->format('d.m.Y') : '-' }}</td>
                            <td data-duration="{{ $task->timeSpent() }}">
                                {{ \Carbon\CarbonInterval::seconds($task->timeSpent())->cascade()->forHumans(['short' => true, 'options' => 0]) }}
                            </td>
                            <td>
                                {{ $task->assignedUser !== null ? $task->assignedUser->name : '-' }}
                            </td>
                            <td>{{ $task->createdUser->name }}</td>
                            <td>
                                <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" target="_self"
                                    class="btn btn-dark">
                                    {{ __('Edit') }}
                                </a>
                                <form class="d-inline" action="{{ route('projects.tasks.destroy', [$project, $task]) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-dark" type="submit">{{ __('Delete') }}</button>
                                </form>

                                @if ($task->openTracking)
                                    <form class="d-inline"
                                        action="{{ route('projects.tasks.trackings.stop', [$project, $task, $task->openTracking]) }}"
                                        method="POST">
                                        @method('PATCH')
                                        @csrf

                                        <button class="btn btn-dark" type="submit">{{ __('Stop') }}</button>
                                    </form>
                                @else
                                    <form class="d-inline"
                                        action="{{ route('projects.tasks.trackings.start', [$project, $task, $task->openTracking]) }}"
                                        method="POST">
                                        @method('POST')
                                        @csrf

                                        <button class="btn btn-dark" type="submit">{{ __('Start') }}</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
