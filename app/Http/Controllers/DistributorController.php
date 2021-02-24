<?php

namespace App\Http\Controllers;

use App\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributor = Distributor::all();
        return view('distributor.index', compact('distributor'));
    }

    public function create()
    {
        return view('distributor.create');
    }

    public function store()
    {
        request()->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $input = request()->all();

        Distributor::create($input);

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan');
    }

    public function show(Distributor $distributor)
    {
        //
    }

    public function edit(Distributor $distributor)
    {
        return view('distributor.edit', compact('distributor'));
    }

    public function update(Distributor $distributor)
    {
        request()->validate([
            'nama_distributor' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
        ]);

        $input = request()->all();

        $distributor->update($input);

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diupdate');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus');
    }
}
