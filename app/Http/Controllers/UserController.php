<?php

namespace App\Http\Controllers;

use PDF;
use App\{User, Level};
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;





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

    public function store(UserRequest $request)
    {

        $input = $request->all();
        $input['password'] = bcrypt('password');
        $input['level_id'] = $request->input('level');


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

    public function update(UserUpdateRequest $request, User $user)
    {
        $input = $request->all();
        $input['level_id'] = $request->input('level');

        $user->update($input);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    public function generate()
    {
        $users = User::where('level_id', 2)->get();
        $pdf = PDF::loadview('users.generate', ['users' => $users])->setPaper('a4', 'landscape');


        return $pdf->download('Data-Karyawan.pdf');
    }
}
