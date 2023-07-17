<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cities
        </h2>
    </x-slot>
    <h1>Cities</h1>

    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Create City</a>

    <a href="{{ route('cities.weather') }}" class="btn btn-primary mb-3">All Cities Weather data</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <a href="{{ route('cities.show', $city->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this city?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-guest-layout>