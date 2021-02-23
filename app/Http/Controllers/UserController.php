<?php

namespace App\Http\Controllers;

use App\Level;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('level')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('users.create', compact('levels'));
    }

    public function store()
    {
        request()->validate([
            'username' => 'required|unique:users',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'level_id' => 'required'
        ]);

        $input = request()->all();
        $input['password'] = bcrypt('password');

        User::create($input);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        $levels = Level::all();
        return view('users.edit', compact('user', 'levels'));
    }

    public function update(User $user)
    {
        request()->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'level_id' => 'required'
        ]);

        $input = request()->all();

        $user->update($input);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
