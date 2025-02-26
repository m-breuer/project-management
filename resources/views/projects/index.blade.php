@extends('layouts.app')

@section('heading')
    <h1>{{ __('Projects') }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route('projects.create') }}" target="_self" class="btn btn-dark">{{ __('Create') }}</a>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col"><span class="visually-hidden">{{ __('Toolbar') }}</span></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <th>{{ $project->name }}</th>

                        <td class="text-end">
                            <a href="{{ route('projects.show', $project) }}" target="_self" class="btn btn-dark">
                                {{ __('Show') }}
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" target="_self" class="btn btn-dark">
                                {{ __('Edit') }}
                            </a>
                            <form class="d-inline" action="{{ route('projects.destroy', $project) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-dark" type="submit">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endsection
