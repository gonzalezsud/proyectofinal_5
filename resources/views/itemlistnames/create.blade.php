@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Item List Name</h1>

        <form action="{{ route('itemlistnames.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="item" class="block">Item:</label>
                <select name="item" id="item" class="border border-gray-400 px-2 py-1 rounded">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="listname" class="block">List Name:</label>
                <select name="listname" id="listname" class="border border-gray-400 px-2 py-1 rounded">
                    @foreach ($listnames as $listname)
                        <option value="{{ $listname->id }}">{{ $listname->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="pieces" class="block">Pieces:</label>
                <input type="number" name="pieces" id="pieces" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
@endsection
