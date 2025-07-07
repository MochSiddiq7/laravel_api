@extends('layouts.admin') {{-- Sesuaikan jika layout berbeda --}}

@section('title', 'Daftar User')

@section('content')
    <div class="container mt-4">
        <h2>Daftar User</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


       <table class="table table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>No</th> <!-- Tambahkan kolom nomor -->
            <th>Email</th>
            <th>Role</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td> <!-- Hitung nomor urut sesuai halaman -->
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>{{ $user->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $user->updated_at->format('d-m-Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', ['id' => $user->id_user]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.user.delete', ['id' => $user->id_user]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


        {{-- Paginate the users --}}
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection