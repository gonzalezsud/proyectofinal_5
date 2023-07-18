<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;



class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10);
        // $items = Item::all();
        $categories = Category::all();
    return view('items.index', compact('items', 'categories'));
    $categories = Category::all();
    $selectedItem = null; // O utiliza la lógica para obtener el elemento seleccionado

    return view('items.index', compact('categories', 'selectedItem'));
}

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'note' => 'nullable',
        'category_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }

    $item = new Item;
    $item->name = $request->name;
    $item->note = $request->note;
    $item->category_id = $request->category_id;
    $item->image = $imagePath;
    $item->save();

    return redirect()->route('items.index');
}

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    
    public function update(Request $request, Item $item)
{
    $request->validate([
        'name' => 'required',
        'note' => 'nullable',
        'category_id' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $item->image = $imagePath;
    }

    $item->name = $request->name;
    $item->note = $request->note;
    $item->category_id = $request->category_id;
    $item->save();

    return redirect()->route('items.index');
}


    public function destroy(Item $item)
    {
        DB::table('item_listnames')->where('item_id', $item->id)->delete();
        $item->delete();
    
        return redirect()->route('items.index');
    }

    public function show($id)
{
    $item = Item::findOrFail($id);
    return response()->json($item);
}
    public function category()
{
    return $this->belongsTo(Category::class);
}
}
