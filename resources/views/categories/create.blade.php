@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block">Name:</label>
                <input type="text" name="name" id="name" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
@endsection
