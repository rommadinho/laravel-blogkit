<?php

namespace App\Http\Controllers;

use App\Models\LevelUser;
use App\Models\User;
use Illuminate\Http\Request;

class DataUser extends Controller
{
    public function index()
{
    $users = User::with('level')->get();
    return view('user.index', compact('users'));
}

public function edit($id)
{
    $user = User::find($id);
    $levels = LevelUser::all();
    return view('user.edit', compact('user', 'levels'));
}

public function update(Request $request, $id)
{
    $user = User::find($id);
    $user->update($request->all());
    return redirect()->route('user.index');
}

public function destroy($id)
{
    User::find($id)->delete();
    return redirect()->route('user.index');
}

}
