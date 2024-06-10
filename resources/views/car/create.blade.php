@extends('layouts.dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">

    <!-- Example usage in a view -->
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <div class="col-md-8 offset-md-2">
                <div class="card mt-4">
                    <div class="card-body">
                        <h1 class="text-2xl font-bold mb-4">Add a new Car</h1>
                        <form method="post" action="{{ route('car.store') }}" class="bg-white p-6 rounded-lg shadow-md">
                            @csrf <!-- Include CSRF token for security -->
                            @method('post')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" id="color" name="color" placeholder="Color" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="plate_number" class="form-label">Plate Number</label>
                                <input type="text" id="plate_number" name="plate_number" placeholder="Plate Number" class="form-control">
                            </div>
                            <input type="hidden" name="customers_id" value="{{ $customer->id }}">
                            <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save Car</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
