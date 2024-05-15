<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Faker\Provider\Base;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function show(string $id):View {

        return view('barang.profile',[
        'barang' => Barang::findOrFail($id)
        ]);
    }

    public function index(): View
    {
       $barang = Barang::latest()->paginate(10);
       return view('barang.index',compact('barang'));
    }


    public function create(): View
    {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required|min:5',
            'harga' => 'required|int|min:3|',

        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);

        return redirect()->route('barang.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(string $id): View
    {
        $barang = Barang::findOrFail($id);

        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_barang'   => 'required|min:5',
            'harga'  => 'required|int|min:3',
            
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
                'nama_barang'  => $request->nama_barang,
                'harga'     => $request->harga
            ]);

        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}