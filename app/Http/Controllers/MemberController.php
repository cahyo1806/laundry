<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MemberController extends Controller
{
    public function show(string $id):View {

        return view('member.profile',[
        'member' => Member::findOrFail($id)
        ]);
    }

    public function index(): View
    {
       $member = Member::latest()->paginate(10);
       return view('member.index',compact('member'));
    }

    public function create(): View
    {
        return view('member.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'no_identitas' => 'required|int|min:5|unique:member,no_identitas',
            'nama_member' => 'required|min:5',
            'password' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_hp' => 'required|min:5',
            'tgl_join' => 'required|date',

        ]);

        Member::create([
            'no_identitas' => $request->no_identitas,
            'nama_member' => $request->nama_member,
            'password' => md5($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_join' => $request->tgl_join,
        ]);

        return redirect()->route('member.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(string $id): View
    {
        $member = Member::findOrFail($id);

        return view('member.edit', compact('member'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'no_identitas'  => 'required|int|min:5',
            'nama_member'   => 'required|min:5',
            'password'      => 'required|min:5',
            'alamat'        => 'required|min:5',
            'no_hp'         => 'required|min:5',
            'tgl_join'      => 'required'
        ]);

        $member = Member::findOrFail($id);
        $member->update([
                'no_identitas'  => $request->no_identitas,
                'nama_member'  => $request->nama_member,
                'password'  => md5($request->password),
                'alamat'     => $request->alamat,
                'no_hp'     => $request->no_hp,
                'tgl_join'     => $request->tgl_join
            ]);

        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}