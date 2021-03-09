<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'create', 'store', 'edit', 'update');
    }

    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }

    public function create()
    {
        return view('member.create');
    }

    public function store()
    {
        request()->validate([
            'nama_member' => 'required',
            'jk' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);

        Member::create(request()->all());
        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan');
    }

    public function show(Member $member)
    {
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        request()->validate([
            'nama_member' => 'required',
            'jk' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
        ]);

        $member->update(request()->all());
        return redirect()->route('member.index')->with('success', 'Member berhasil diupdate');
    }

    public function destroy(Member $member)
    {
        $member->transaksi()->delete();
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Member berhasil dihapus');
    }
}
