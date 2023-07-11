@extends('layouts.app')

@section('content')
    <h1>Create City</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cities.store') }}" method="POST" class="row">
        @csrf
        <div class="form-group col-3">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group col-3">
            <button type="submit" class="btn btn-primary" style="margin-top: 24px;">Create</button>
        </div>
    </form>
@endsection