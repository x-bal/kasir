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
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create',);
    }

    public function store(UserRequest $request)
    {

        $input = $request->all();
        $input['password'] = bcrypt('password');
        $input['level'] = $request->input('level');

        // dd($input);

        User::create($input);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $input = $request->all();
        $input['level'] = $request->input('level');

        $user->update($input);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->order()->delete();
        $user->transaksi()->delete();
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    public function generate()
    {
        $users = User::where('level', 'karyawan')->get();
        $pdf = PDF::loadview('users.generate', ['users' => $users])->setPaper('a4', 'landscape');


        return $pdf->download('Data-Karyawan.pdf');
    }
}
