<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Http\Requests\DistributorRequest;

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

    public function store(DistributorRequest $request)
    {
        Distributor::create($request->all());

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

    public function update(DistributorRequest $request, Distributor $distributor)
    {
        $distributor->update($request->all());

        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diupdate');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus');
    }
}
