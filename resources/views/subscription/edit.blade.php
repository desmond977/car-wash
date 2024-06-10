@extends('layouts.dashboard')
@section('content')
<div class="container my-4">
    <h1 class="mb-4">Edit Subscription</h1>
    <form action="{{ route('subscription.update', $subscription->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="subscription_types_id" class="form-label">Subscription Type</label>
            <select name="subscription_types_id" id="subscription_types_id" class="form-select">
                @foreach ($subscriptionTypes as $type)
                    <option value="{{ $type->id }}" {{ $type->id == $subscription->subscription_types_id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="number_of_wash" class="form-label">Number of Washes</label>
            <input type="number" name="number_of_wash" id="number_of_wash" class="form-control" value="{{ $subscription->number_of_wash }}">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $subscription->start_date }}">
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $subscription->end_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Subscription</button>
    </form>
</div>
@endsection
