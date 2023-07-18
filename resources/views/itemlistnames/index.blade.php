@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Item List Names</h1>

        <a href="{{ route('itemlistnames.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Item List Name</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>List Name</th>
                    <th>Pieces</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itemlistnames as $itemlistname)
                    <tr>
                        <td>{{ $itemlistname->item ? $itemlistname->item->name : '' }}</td>

                        {{-- <td>{{ $itemlistname->item->name }}</td> --}}
                        <td>{{ $itemlistname->item ? $listname->item->name : ''}}</td>
                        <td>{{ $itemlistname->pieces }}</td>
                        <td>
                            <a href="{{ route('itemlistnames.edit', $itemlistname->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('itemlistnames.destroy', $itemlistname->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
