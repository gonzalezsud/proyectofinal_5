@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Item</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block">Name:</label>
                <input type="text" name="name" id="name" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <div class="mb-4">
                <label for="note" class="block">Note:</label>
                <textarea name="note" id="note" class="border border-gray-400 px-2 py-1 rounded"></textarea>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block">Category:</label>
                <select name="category_id" id="category_id" class="border border-gray-400 px-2 py-1 rounded">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="image" class="block">Image:</label>
                <input type="file" name="image" id="image" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
@endsection
