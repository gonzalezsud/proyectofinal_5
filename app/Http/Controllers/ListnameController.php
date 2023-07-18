<?php

namespace App\Http\Controllers;

use App\Models\Listname;
use Illuminate\Http\Request;

class ListnameController extends Controller
{
    public function index()
    {
        $listnames = Listname::all();
        return view('listnames.index', compact('listnames'));
    }

    public function create()
    {
        return view('listnames.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        Listname::create($request->all());

        return redirect()->route('listnames.index');
    }

    public function edit(Listname $listname)
    {
        return view('listnames.edit', compact('listname'));
    }

    public function update(Request $request, Listname $listname)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
        ]);

        $listname->update($request->all());

        return redirect()->route('listnames.index');
    }

    public function destroy(Listname $listname)
    {
        $listname->delete();

        return redirect()->route('listnames.index');
    }
}
