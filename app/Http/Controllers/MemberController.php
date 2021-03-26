<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Member;
use App\Transaksi;
use PDF;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'create', 'store', 'edit', 'update', 'get');
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

    public function store(MemberRequest $request)
    {
        $input = $request->all();
        $input['disc'] = 3;

        $code = 002 . date('dmy') . rand(10000, 99999);
        $input['kode_member'] = $code;

        Member::create($input);
        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan');
    }

    public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    public function update(MemberRequest $request, Member $member)
    {
        $member->update($request->all());
        return redirect()->route('member.index')->with('success', 'Member berhasil diupdate');
    }

    public function destroy(Member $member)
    {
        $member->transaksi()->delete();
        $member->delete();
        return redirect()->route('member.index')->with('success', 'Member berhasil dihapus');
    }

    public function get(Member $member)
    {
        return response($member);
    }

    public function history(Member $member)
    {
        $history = Transaksi::with('member', 'orders')->where('member_id', $member->id)->latest()->get();

        return view('member.history', compact('history', 'member'));
    }

    public function print(Member $member)
    {
        $pdf = PDF::loadview('member.print', ['member' => $member])->setPaper('a4', 'potrait');

        return $pdf->download('Member-Card-' . $member->nama_member . '.pdf');
        // return view('member.print', compact('member'));
    }
}
