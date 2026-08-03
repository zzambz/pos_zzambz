@extends('layouts.app')

@section('title', 'Halaman Produk')

@section('content')
<div class="row">
    <div class="col-12 bg-white p-4 rounded shadow-sm">
        
        <h2 class="mb-3">Halaman Produk</h2>

        <div class="mb-3">
            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">create</a>
        </div>

        <form action="{{ route('admin.produk.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search nama produk" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th>Harga Jval</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($produk->firstItem() - 1) }}</td>
                            
                            <td>{{ $item->user->name ?? 'N/A' }}</td>
                            
                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" width="100" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak Ada Foto</span>
                                @endif
                            </td>
                            
                            <td>{{ $item->nama }}</td>
                            
                            <td>Rp. {{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                            
                            <td>Rp. {{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                            
                            <td>{{ $item->stok }}</td>
                            
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Data produk belum ada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $produk->links() }}
        </div>

    </div>
</div>
@endsection