@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List Names</h1>

        <a href="{{ route('listnames.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add List Name</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listnames as $listname)
                    <tr>
                        <td>{{ $listname->name }}</td>
                        <td>{{ $listname->date }}</td>
                        <td>
                            <a href="{{ route('listnames.edit', $listname->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('listnames.destroy', $listname->id) }}" method="POST" class="inline">
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
