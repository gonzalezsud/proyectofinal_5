@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Items</h1>

        <form action="{{ route('items.index') }}" method="GET" class="mb-4">
            <div class="flex">
                <div class="mr-4">
                    <label for="category" class="block">Category:</label>
                    <select name="category" id="category" class="border border-gray-300 rounded px-2 py-1">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
                </div>
                <div class="mb-4">
                    <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Item</a>
                </div>
            </div>
        </form>

        <table class="w-full">
            <thead>
                <tr>
                    <th>
                        <a href="{{ route('items.index', ['sort' => 'name']) }}" class="flex items-center">
                            Name
                            @if (request('sort') == 'name')
                                @if (request('direction') == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 ml-1">
                                        <path d="M5 15l7-7 7 7" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 ml-1">
                                        <path d="M19 9l-7 7-7-7" />
                                    </svg>
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ route('items.index', ['sort' => 'category']) }}" class="flex items-center">
                            Category
                            @if (request('sort') == 'category')
                                @if (request('direction') == 'asc')
                                    
                                @else
                                    
                                @endif
                            @endif
                        </a>
                    </th>
                    <th>Note</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category ? $item->category->name : 'N/A' }}</td>
                        <td>{{ $item->note }}</td>
                        <td>
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-16 h-16">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $items->withQueryString()->links() }}
        </div>
    </div>
@endsection
