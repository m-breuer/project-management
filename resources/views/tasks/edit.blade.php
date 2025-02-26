@extends('layouts.app')

@section('heading')
    <h1>{{ __('Update Task') }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route('projects.show', $project) }}" target="_self" class="btn btn-dark">{{ __('Show Project') }}</a>
        <a href="{{ route('projects.tasks.create', $project) }}" target="_self"
            class="btn btn-dark">{{ __('Create Task') }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST" action="{{ route('projects.tasks.update', [$project, $task]) }}">
        @method('PATCH')
        @csrf

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Name') }}"
                    class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $task->name }}" required>
                <label for="name">{{ __('Name') }}</label>

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                    <option disabled>{{ __('Choose...') }}</option>

                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" {{ $task->status->value !== $status->value ?: 'selected' }}>
                            {{ $status->name }}</option>
                    @endforeach
                </select>
                <label for="status">{{ __('Status') }}</label>

                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea type="text" placeholder="{{ __('Description') }}"
                    class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    style="height: 250px">{{ $task->description }}</textarea>
                <label for="description">{{ __('Description') }}</label>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="number" step="0.5" placeholder="{{ __('Expenditure (hours)') }}"
                    class="form-control @error('expenditure') is-invalid @enderror" id="expenditure" name="expenditure"
                    value="{{ $task->expenditure }}">
                <label for="expenditure">{{ __('Expenditure (hours)') }}</label>

                @error('expenditure')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="date" placeholder="{{ __('Deadline') }}"
                    class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline"
                    value="{{ $task->deadline === null ?: $task->deadline->format('Y-m-d') }}">
                <label for="deadline">{{ __('Deadline') }}</label>

                @error('deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select @error('assigned_user_id') is-invalid @enderror" id="assigned_user_id"
                    name="assigned_user_id">
                    <option value="">{{ __('Choose...') }}</option>

                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $task->assigned_user_id !== $user->id ?: 'selected' }}>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
                <label for="assigned_user_id">{{ __('Responsible Person') }}</label>

                @error('assigned_user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr />
        </div>

        <div class="col-12">
            <button class="btn btn-dark" type="submit">{{ __('Update') }}</button>
        </div>

    </form>
@endsection
