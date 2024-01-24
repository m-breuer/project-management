@extends('layouts.app')

@section("heading")
    <h1>{{ __("Dashboard") }}</h1>
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __("Todos")}}:</h2>
                </div>

                <div class="card-body">
                    @forelse($openTasks as $task)
                        <p>{{ $task->name }}</p>
                    @empty
                        <div class="alert alert-success" role="alert">
                            {{ __("Currently no work to do.") }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>{{ __("Open Time Tracking")}}:</h2>
                </div>

                <div class="card-body">
                    @forelse($openTrackings as $tracking)
                        <p>{{ $tracking->task->name }}</p>
                    @empty
                        <div class="alert alert-success" role="alert">
                            {{ __("Start new tracking.") }}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
