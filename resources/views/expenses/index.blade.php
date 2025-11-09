@extends('layouts.app')
@section('title','Pengeluaran - Money Tracking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1">Daftar Pengeluaran</h5>
        <p class="text-muted mb-0">Semua data pengeluaran yang telah Anda catat</p>
    </div>
    <a href="{{ route('expenses.create') }}" class="btn btn-danger px-3">
        <i class="bi bi-dash-circle me-1"></i> Tambah
    </a>
</div>

@if(session('success'))
<div class="alert alert-success fade-up shadow-sm border-0 rounded-3">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
    <div class="card-header">
        <i class="bi bi-cash-stack me-2"></i> Data Pengeluaran
    </div>
    <div class="card-body p-0">
        <table class="table table-modern mb-0 align-middle">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($expenses as $e)
                <tr>
                    <td>{{ $e->category ?? $e->nama }}</td>
                    <td class="fw-semibold text-danger">
                        Rp {{ number_format($e->amount ?? $e->jumlah,0,',','.') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($e->tanggal ?? $e->created_at)->format('d M Y') }}</td>
                    <td>{{ $e->description ?? $e->keterangan }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-primary me-1" href="{{ route('expenses.edit', $e->id) }}">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('expenses.destroy', $e->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">
                        Belum ada data pengeluaran
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection