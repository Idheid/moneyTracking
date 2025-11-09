@extends('layouts.app')
@section('title','Pemasukan - Money Tracking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1">Daftar Pemasukan</h5>
        <p class="text-muted mb-0">Semua data pemasukan yang telah Anda catat</p>
    </div>
    <a href="{{ route('incomes.create') }}" class="btn btn-success px-3">
        <i class="bi bi-plus-circle me-1"></i> Tambah
    </a>
</div>

@if(session('success'))
<div class="alert alert-success fade-up shadow-sm border-0 rounded-3">
    {{ session('success') }}
</div>
@endif

<div class="card shadow-sm">
    <div class="card-header">
        <i class="bi bi-wallet2 me-2"></i> Data Pemasukan
    </div>
    <div class="card-body p-0">
        <table class="table table-modern mb-0 align-middle">
            <thead>
                <tr>
                    <th>Sumber</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($incomes as $i)
                <tr>
                    <td>{{ $i->source ?? $i->nama }}</td>
                    <td class="fw-semibold text-success">
                        Rp {{ number_format($i->amount ?? $i->jumlah,0,',','.') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($i->tanggal ?? $i->created_at)->format('d M Y') }}</td>
                    <td>{{ $i->description ?? $i->keterangan }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-primary me-1" href="{{ route('incomes.edit', $i->id) }}">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('incomes.destroy', $i->id) }}" method="POST" class="d-inline">
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
                        Belum ada data pemasukan
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection