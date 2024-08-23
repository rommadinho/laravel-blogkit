<?php

namespace App\Http\Controllers;

use App\Models\LevelUser;
use Illuminate\Http\Request;

class LevelUserController extends Controller
{
    public function index()
    {
        $levels = LevelUser::all();
        return view('leveluser.index', compact('levels'));
    }

    public function create()
    {
        return view('leveluser.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        LevelUser::create($request->all());
        return redirect()->route('leveluser.index');
    }

    public function edit(LevelUser $levelUser)
    {
        return view('leveluser.edit', compact('levelUser'));
    }

    public function update(Request $request, LevelUser $levelUser)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $levelUser->update($request->all());
        return redirect()->route('leveluser.index');
    }

    public function destroy(LevelUser $levelUser)
    {
        $levelUser->delete();
        return redirect()->route('leveluser.index');
    }
}
