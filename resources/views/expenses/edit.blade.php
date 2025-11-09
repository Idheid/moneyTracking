@extends('layouts.app')
@section('title','Edit Pengeluaran - Money Tracking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1">Edit Pengeluaran</h5>
        <p class="text-muted mb-0">Perbarui data pengeluaran Anda</p>
    </div>
</div>

<div class="card shadow-sm fade-up">
    <div class="card-body">
        <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="category" class="form-control"
                       value="{{ old('category', $expense->category ?? $expense->nama) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="amount" class="form-control" step="0.01"
                       value="{{ old('amount', $expense->amount ?? $expense->jumlah) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                       value="{{ old('tanggal', \Carbon\Carbon::parse($expense->tanggal ?? $expense->created_at)->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $expense->description ?? $expense->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Perbarui
                </button>
                <a href="{{ route('expenses.index') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection