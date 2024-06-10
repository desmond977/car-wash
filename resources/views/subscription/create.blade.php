{{-- <x-app-layout> --}}
@extends('layouts.dashboard')
@section('content')

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Layout -->
    <div class="d-flex flex-column min-vh-100 bg-light">
        <!-- Include the sidebar component -->
        {{-- <x-sidebar /> --}}

        <!-- Main content -->
        <div class="flex-grow-1 p-3">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1 class="h3 mb-4">Create Subscription for {{ $customer->first_name }}</h1>
                <form action="{{ route('subscription.store', ['customer' => $customer]) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label for="subscription_types_id" class="form-label">Subscription Type</label>
                        <select name="subscription_types_id" id="subscription_types_id" class="form-select" onchange="updateNumberOfWashes()">
                            @foreach ($subscriptionTypes as $type)
                                <option value="{{ $type->id }}" data-washes="{{ $type->number_of_washes }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="customers_id" value="{{ $customer->id }}">
                    <div class="mb-3">
                        <label for="number_of_wash" class="form-label">Number of Washes</label>
                        <input type="number" name="number_of_wash" id="number_of_wash" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Subscription</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    {{-- <script>
        function updateNumberOfWashes() {
            const subscriptionTypeSelect = document.getElementById('subscription_types_id');
            const numberOfWashesInput = document.getElementById('number_of_wash');
            const selectedOption = subscriptionTypeSelect.options[subscriptionTypeSelect.selectedIndex];
            const numberOfWashes = selectedOption.getAttribute('data-washes');
            numberOfWashesInput.value = numberOfWashes;
        }
    </script> --}}
{{-- </x-app-layout> --}}
@endsection
