

<div class="container">
    <h1>Create Subscription for {{ $customer->first_name }}</h1>
    <form action="{{ route('subscription.store', ['customer'=>$customer]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subscription_types_id">Subscription Type</label>
            <select name="subscription_types_id" id="subscription_types_id" class="form-control">
                @foreach ($subscriptionTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">

            <input type="hidden" name="customers_id" value="{{ $customer->id }}">
        </div>
        <div class="form-group">
            <label for="number_of_wash">Number of Washes</label>
            <input type="number" name="number_of_wash" id="number_of_wash" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Subscription</button>
    </form>
</div>

