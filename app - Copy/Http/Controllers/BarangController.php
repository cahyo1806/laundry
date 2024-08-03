<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function show(string $id): View {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function index(): View {
       $barang = Barang::latest()->paginate(10);
       return view('barang.index', compact('barang'));
    }

    public function create(): View {
        return view('barang.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'kode_barang' => 'required|min:5|unique:barang,kode_barang',
            'nama_barang' => 'required|min:5',
            'harga' => 'required|integer|min:0'
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(string $id): View {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, string $id): RedirectResponse {
        $request->validate([
            'kode_barang' => 'required|min:5|unique:barang,kode_barang,' . $id,
            'nama_barang' => 'required|min:5',
            'harga' => 'required|integer|min:0'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga
        ]);

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(string $id): RedirectResponse {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
