<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
   public function index(SearchRequest $request)
{
    $keyword = $request->input('search');
    $produk = Produk::query()
        ->when($keyword, function ($q) use ($keyword) {
            $q->where('nama', 'like', "%{$keyword}%");
        })
        ->latest() // Ini sama dengan orderBy('created_at', 'desc') yang ada di log query Anda
        ->paginate(10)
        ->withQueryString();

    return view('produk.index', compact('produk'));
}
    public function create()
    {
        return view('produk.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $produk = [
            'user_id'     => auth()->id(),
            'nama'        => $data['name'],
            'harga_beli'  => $data['purchase_price'],
            'harga_jual'  => $data['selling_price'],
            'stok'        => $data['stock'],
            'foto'        => null,
        ];

        if ($request->hasFile('foto')) {
            $produk['foto'] = $request->file('foto')->store('products', 'public');
        }

        Produk::create($produk);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(UpdateRequest $request, Produk $produk)
    {
        $data = $request->validated();

        $updateData = [
            'nama'       => $data['name'],
            'harga_beli' => $data['purchase_price'],
            'harga_jual' => $data['selling_price'],
            'stok'       => $data['stock'],
        ];

        if ($request->hasFile('foto')) {

            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }

            $updateData['foto'] = $request->file('foto')->store('products', 'public');
        }

        $produk->update($updateData);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}