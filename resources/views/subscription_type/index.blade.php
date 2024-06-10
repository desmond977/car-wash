@extends('layouts.dashboard')
@section('content')
<div class="container my-4">
    <!-- Success Message -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Header and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Subscription Types</h1>
        <a href="{{ route('subscription_type.create') }}" class="btn btn-primary">Add New Subscription Type</a>
    </div>

    <!-- Table -->
    @if($subscriptions->isEmpty())
        <p class="text-muted">No subscription types available.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="DataTables_Table_0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Number of Cars Allowed</th>
                        <th>Duration (days)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $subscriptionType)
                        <tr>
                            <td>{{ $subscriptionType->name }}</td>
                            <td>{{ $subscriptionType->description }}</td>
                            <td>{{ $subscriptionType->formattedPrice() }}</td>
                            <td>{{ $subscriptionType->number_cars_allowed }}</td>
                            <td>{{ $subscriptionType->duration }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('subscription_type.edit', $subscriptionType->id) }}" class="btn btn-secondary btn-sm mx-1">Edit</a>
                                    <form action="{{ route('subscription_type.delete', $subscriptionType->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
