<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit City
        </h2>
    </x-slot>
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.update', $city->id) }}" method="POST" class="row">
        @csrf
        @method('PUT')
        <div class="form-group  col-3">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $city->name) }}" required>
        </div>
        <div class="form-group col-3">
            <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Update</button>
        </div>
    </form>
</x-guest-layout>