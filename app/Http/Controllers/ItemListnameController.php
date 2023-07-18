<?php

namespace App\Http\Controllers;

use App\Models\ItemListname;
use App\Models\Item;
use App\Models\Listname;
use Illuminate\Http\Request;

class ItemListnameController extends Controller
{
    public function index()
    {
        $itemlistnames = ItemListname::all();
        return view('itemlistnames.index', compact('itemlistnames'));
    }

    public function create()
    {
        $items = Item::all();
        $listnames = Listname::all();
        return view('itemlistnames.create', compact('items', 'listnames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'listname' => 'required',
            'pieces' => 'required',
        ]);

        ItemListname::create([
            'item_id' => $request->item,
            'listname_id' => $request->listname,
            'pieces' => $request->pieces,
        ]);

        return redirect()->route('itemlistnames.index');
    }

    public function edit(ItemListname $itemlistname)
    {
        $items = Item::all();
        $listnames = Listname::all();
        return view('itemlistnames.edit', compact('itemlistname', 'items', 'listnames'));
    }

    public function update(Request $request, ItemListname $itemlistname)
    {
        $request->validate([
            'item' => 'required',
            'listname' => 'required',
            'pieces' => 'required',
        ]);

        $itemlistname->update([
            'item_id' => $request->item,
            'listname_id' => $request->listname,
            'pieces' => $request->pieces,
        ]);

        return redirect()->route('itemlistnames.index');
    }

    public function destroy(ItemListname $itemlistname)
    {
        $itemlistname->delete();

        return redirect()->route('itemlistnames.index');
    }
}
