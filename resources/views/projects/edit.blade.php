@extends('layouts.app')

@section('heading')
    <h1>{{ __("Edit Project") }}</h1>

    <div class="btn-group ms-auto">
        <a href="{{ route("project.index") }}" target="_self"
           class="btn btn-dark">{{ __("List") }}</a>
        <a href="{{ route("project.create") }}" target="_self"
           class="btn btn-dark">{{ __("Create") }}</a>
    </div>
@endsection

@section('content')
    <form class="row g-2" method="POST"
          action="{{ route("project.update", $project) }}">
        @method("PATCH")
        @csrf

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Name') }}"
                       class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                       value="{{ $project->name }}" required>
                <label for="name">{{ __("Name") }}</label>

                @error("name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select class="form-select @error('customer_id') is-invalid @enderror" id="customer_id"
                        name="customer_id">
                    <option disabled>{{ __("Choose...") }}</option>

                    @foreach($customers as $customer)
                        <option
                            value="{{ $customer->id }}" {{ $project->customer->id !== $customer->id ?: "selected" }}>
                            {{ $customer->last_name }} ({{ $customer->company_name }})
                        </option>
                    @endforeach
                </select>
                <label for="customer_id">{{ __("Customer") }}</label>

                @error("customer_id")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea type="text" placeholder="{{ __('Description') }}"
                          class="form-control @error('description') is-invalid @enderror" id="description"
                          name="description" style="height: 250px">{{ $project->description }}</textarea>
                <label for="description">{{ __("Description") }}</label>

                @error("description")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">{{ __("Update") }}</button>
        </div>
    </form>
@endsection
