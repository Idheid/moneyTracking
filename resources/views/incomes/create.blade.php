@extends('layouts.app')
@section('title','Tambah Pemasukan - Money Tracking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1">Tambah Pemasukan</h5>
        <p class="text-muted mb-0">Isi formulir di bawah untuk menambahkan data pemasukan baru</p>
    </div>
</div>

<div class="card shadow-sm fade-up">
    <div class="card-body">
        <form action="{{ route('incomes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Sumber</label>
                <input type="text" name="source" class="form-control" value="{{ old('source') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="amount" class="form-control" step="0.01" value="{{ old('amount') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success px-4">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
                <a href="{{ route('incomes.index') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection