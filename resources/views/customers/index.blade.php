@extends('layouts.app')

@section('heading')
    <h1>{{ __("Customers") }}</h1>
    <a href="{{ route("customer.create") }}"
       class="btn btn-dark ms-auto">{{ __("Create") }}</a>
@endsection

@section("content")
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{ __("Salutation") }}</th>
                <th scope="col">{{ __("First Name") }}</th>
                <th scope="col">{{ __("Last name") }}</th>
                <th scope="col">{{ __("Email") }}</th>
                <th scope="col">{{ __("Mobile Number") }}</th>
                <th scope="col">{{ __("Company") }}</th>
                <th scope="col">{{ __("Street") }}</th>
                <th scope="col">{{ __("Location") }}</th>
                <th scope="col">{{ __("Country") }}</th>
                <th scope="col">{{ __("Tax Number") }}</th>
                <th scope="col"><span class="visually-hidden">{{ __("Tools") }}</span></th>
            </tr>
            </thead>
            <tbody>

            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->salutation->name }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                    <td><a href="tel:{{ $customer->mobile_number }}">{{ $customer->mobile_number }}</a></td>
                    <td>{{ $customer->company_name }}</td>
                    <td>{{ $customer->street }}</td>
                    <td>{{ $customer->location }}</td>
                    <td>{{ $customer->country }}</td>
                    <td>{{ $customer->tax_number }}</td>
                    <td>
                        <a href="{{ route("customer.edit", $customer) }}"
                           target="_self" class="btn btn-dark">
                            {{ __("Edit") }}
                        </a>
                        <form class="d-inline"
                              action="{{ route("customer.delete", $customer) }}"
                              method="POST">
                            @method("DELETE")
                            @csrf

                            <button class="btn btn-dark" type="submit">{{ __("Delete") }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
