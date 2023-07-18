@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Item List Name</h1>

        <form action="{{ route('itemlistnames.update', $itemlistname->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="item" class="block">Item:</label>
                <select name="item" id="item" class="border border-gray-400 px-2 py-1 rounded">
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}" {{ $itemlistname->item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="listname" class="block">List Name:</label>
                <select name="listname" id="listname" class="border border-gray-400 px-2 py-1 rounded">
                    @foreach ($listnames as $listname)
                        <option value="{{ $listname->id }}" {{ $itemlistname->listname_id == $listname->id ? 'selected' : '' }}>{{ $listname->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="pieces" class="block">Pieces:</label>
                <input type="number" name="pieces" id="pieces" value="{{ $itemlistname->pieces }}" class="border border-gray-400 px-2 py-1 rounded">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
