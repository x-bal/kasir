<?php

namespace App\Http\Controllers;

use App\{Barang, User, Member, Distributor};

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $user = User::count();
        $member = Member::count();
        $distributor = Distributor::count();

        return view('dashboard.index', compact('barang', 'user', 'member', 'distributor'));
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('dashboard.profile', compact('user'));
    }

    public function UpdateProfile(User $user)
    {
        request()->validate(
            [
                'username' => 'required|unique:users,username,' . $user->id,
                'nama' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'telp' => 'required',
            ],
            [
                'username.unique' => 'Username tidak tersedia',
                'nama.required' => 'Nama tidak boleh kosong',
                'jk.required' => 'Pilih Jenis Kelamin',
                'alamat.required' => 'Alamat tidak boleh kosong',
                'telp.required' => 'Telp tidak boleh kosong',
            ]
        );

        $input = request()->all();

        if (request('password')) {
            $input['password'] = bcrypt(request('password'));
        } else {
            $input['password'] = $user->password;
        }

        $user->update($input);

        return redirect()->route('dashboard')->with('success', 'Profile berhasil diupdate');
    }
}
