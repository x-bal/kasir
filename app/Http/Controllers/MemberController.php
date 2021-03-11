<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Member;

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

    public function store(MemberRequest $request)
    {
        $input = $request->all();
        $input['disc'] = 5;

        Member::create($input);
        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan');
    }

    public function show(Member $member)
    {
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
}
