<div class="bg-white shadow-md rounded-lg mb-6 p-4">
    <table class="w-full border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Subscription Type</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Customer ID</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Number of wash</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Start Date</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">End Date</th>
                {{-- <th class="px-4 py-2 bg-gray-200 border border-gray-400">User Id</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Edit</th>
                <th class="px-4 py-2 bg-gray-200 border border-gray-400">Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td class="px-4 py-2 border border-gray-400">{{ $subscription->subscription_types_id }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $subscription->customers_id }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $subscription->number_of_wash }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $subscription->start_date }}</td>
                    <td class="px-4 py-2 border border-gray-400">{{ $subscription->end_date }}</td>
                    {{-- <td class="px-4 py-2 border border-gray-400 text-center">
                        <a href="{{ route('car.edit', ['car' => $car]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-yellow-600">Edit</a>
                    </td> --}}
                    {{-- <td class="px-4 py-2 border border-gray-400 text-center">
                        <form method="POST" action="{{ route('car.delete', ['car' => $car]) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="bg-red-500 text-white px-4 py-2 rounded cursor-pointer hover:bg-red-600">
                        </form>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
