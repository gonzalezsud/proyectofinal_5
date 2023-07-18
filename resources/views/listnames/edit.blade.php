@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit List Name</h1>

        <form action="{{ route('listnames.update', $listname->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block">Name:</label>
                <input type="text" name="name" id="name" value="{{ $listname->name }}" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <div class="mb-4">
                <label for="date" class="block">Date:</label>
                <input type="date" name="date" id="date" value="{{ $listname->date }}" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
