@extends('layouts.app')

@section('heading')
    <h1>{{ __("Create Customer") }}</h1>

    <a href="{{ route("customer.index") }}" target="_self" class="btn btn-dark ms-auto">{{ __("List") }}</a>
@endsection

@section('content')

    <form class="row g-2" method="POST" action="{{ route("customer.store") }}">
        @method("POST")
        @csrf

        <div class="col-md-2">
            <div class="form-floating">
                <select class="form-select @error('salutation') is-invalid @enderror" id="salutation" name="salutation">
                    <option selected disabled>{{ __("Choose...") }}</option>
                    @foreach($salutations as $salutation)
                        <option value="{{ $salutation->value }}">{{ $salutation->name }}</option>
                    @endforeach
                </select>
                <label for="salutation">{{ __("Salutation") }}</label>

                @error("salutation")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5 form-floating">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Firstname') }}"
                       class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"
                       value="{{ old("first_name") }}">
                <label for="last_name">{{ __("Firstname") }}</label>

                @error("first_name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Lastname') }}"
                       class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"
                       value="{{ old("last_name") }}">
                <label for="last_name">{{ __("Lastname") }}</label>

                @error("last_name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="tel" placeholder="{{ __('Mobile Number') }}"
                       class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
                       name="mobile_number" value="{{ old("mobile_number") }}">
                <label for="mobile_number">{{ __("Mobile Number") }}</label>

                @error("mobile_number")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="email" placeholder="{{ __('Email') }}"
                       class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                       value="{{ old("email") }}">
                <label for="email">{{ __("Email") }}</label>

                @error("email")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-md-7">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Company') }}"
                       class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                       name="company_name" value="{{ old("company_name") }}" required>
                <label for="company_name">{{ __("Company") }}</label>

                @error("company_name")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Tax Number') }}"
                       class="form-control @error('tax_number') is-invalid @enderror" id="tax_number" name="tax_number"
                       value="{{ old("tax_number") }}">
                <label for="tax_number">{{ __("Tax Number") }}</label>

                @error("tax_number")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Street') }}"
                       class="form-control @error('street') is-invalid @enderror" id="street" name="street"
                       value="{{ old("street") }}">
                <label for="street">{{ __("Street") }}</label>

                @error("street")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Location') }}"
                       class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                       value="{{ old("location") }}">
                <label for="location">{{ __("Location") }}</label>

                @error("location")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" placeholder="{{ __('Country') }}"
                       class="form-control @error('country') is-invalid @enderror" id="country" name="country"
                       value="{{ old("country") }}">
                <label for="country">{{ __("Country") }}</label>

                @error("country")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <hr/>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-dark">{{ __("Create") }}</button>
        </div>
    </form>

@endsection
