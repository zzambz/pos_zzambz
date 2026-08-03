@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

<div class="container">

    {{-- ERROR MESSAGE --}}
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errors') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif
{{-- HEADER --}}
<h1 class="fw-bold mb-3">
    Halaman Penjualan
</h1>

<a href="{{ route('admin.penjualan.create') }}"
   class="btn btn-primary mb-3">
    Create
</a>

    </div>

    {{-- SEARCH --}}
    <form action="{{ route('admin.penjualan.index') }}"
          method="GET"
          class="mb-4">

        <div class="input-group">

            <input
                type="text"
                name="search"
                value="{{ request()->search }}"
                class="form-control"
                placeholder="Search penjualan"
            >

            <button class="btn btn-outline-secondary"
                    type="submit">
                Search
            </button>

        </div>

    </form>

    {{-- TABLE --}}
    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal Transaksi</th>
                    <th>Kasir</th>
                    <th>Total Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th width="170">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($sales as $sale)

                    <tr>

                        {{-- NOMOR --}}
                        <td>
                            {{ $sales->firstItem() + $loop->index }}
                        </td>

                        {{-- TANGGAL --}}
                        <td>
                            {{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}
                        </td>

                        {{-- KASIR --}}
                        <td>
                            {{ $sale->user->name }}
                        </td>

                        {{-- TOTAL --}}
                        <td>
                            Rp.{{ number_format($sale->total_pembayaran, 0, ',', '.') }}
                        </td>

                        {{-- METODE --}}
                        <td>
                            {{ $sale->metode_pembayaran }}
                        </td>

                        {{-- STATUS --}}
                        <td>
                            {{ strtoupper($sale->status) }}
                        </td>

                        {{-- AKSI --}}
<td>
    <div class="d-flex gap-1">

        {{-- DETAIL --}}
        <a href="{{ route('admin.penjualan.show', $sale->id) }}"
           class="btn btn-primary btn-sm">
            Detail
        </a>
        @can('view', $sale)

        {{-- EDIT --}}
        <a href="{{ route('admin.penjualan.edit', $sale) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>
        @endcan
        @can('delete', $sale)

        {{-- HAPUS --}}
        <form action="{{ route('admin.penjualan.destroy', $sale->id) }}"
              method="POST"
              onsubmit="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-danger btn-sm">
               hapus
            </button>

        </form>
@endcan
    </div>
</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            Data Tidak Ditemukan
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $sales->links() }}
    </div>

</div>

@endsection