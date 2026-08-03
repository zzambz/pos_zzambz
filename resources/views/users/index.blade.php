@extends('layouts.app')

@section('title', 'Users')

@section('content')
{{--  BAGIAN @INCLUDE NAVBAR DI SINI SUDAH DIHAPUS AGAR TIDAK DOBEL --}}

<div class="container mt-4">

    <h3 class="mb-3">Halaman Users</h3>

    {{-- CREATE --}}
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">
        Create
    </a>

    {{-- SEARCH --}}
    <form action="{{ route('admin.users.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search nama / email user"
            >
            <button class="btn btn-outline-secondary" type="submit">
                Search
            </button>
        </div>
    </form>

    {{-- TABLE --}}
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th width="50">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>
                        {{ $loop->iteration + ($users->firstItem() ?? 0) - 1 }}
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ optional($user->role)->name ?? '-' }}
                    </td>
                    <td class="d-flex gap-1">
                        {{-- EDIT --}}
                        <a href="{{ route('admin.users.edit', $user) }}"
                           class="btn btn-sm btn-warning">
                             Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.users.destroy', $user) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Data user tidak ada
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>
@endsection