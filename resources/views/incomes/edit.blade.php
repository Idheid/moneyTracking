@extends('layouts.app')
@section('title','Edit Pemasukan - Money Tracking')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="mb-1">Edit Pemasukan</h5>
        <p class="text-muted mb-0">Perbarui data pemasukan yang sudah ada</p>
    </div>
</div>

<div class="card shadow-sm fade-up">
    <div class="card-body">
        <form action="{{ route('incomes.update', $income->id) }}" method="POST">
            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Sumber</label>
                <input type="text" name="source" class="form-control"
                       value="{{ old('source', $income->source ?? $income->nama) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="amount" class="form-control" step="0.01"
                       value="{{ old('amount', $income->amount ?? $income->jumlah) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                       value="{{ old('tanggal', \Carbon\Carbon::parse($income->tanggal ?? $income->created_at)->format('Y-m-d')) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $income->description ?? $income->keterangan) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Perbarui
                </button>
                <a href="{{ route('incomes.index') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection