@extends('layouts.app')

@section('title', 'Dashboard - Money Tracking')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-1">Halo, {{ Auth::user()->name }}</h3>
            <p class="text-muted mb-0">Ringkasan keuangan Anda</p>
        </div>
        <div>
            <a href="{{ route('incomes.create') }}" class="btn btn-success px-3 me-2">
                <i class="bi bi-plus-circle me-1"></i> Tambah Pemasukan
            </a>
            <a href="{{ route('expenses.create') }}" class="btn btn-danger px-3">
                <i class="bi bi-dash-circle me-1"></i> Tambah Pengeluaran
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Total Pemasukan -->
    <div class="col-md-4">
        <div class="card summary-card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="summary-icon text-success me-3"><i class="bi bi-wallet2"></i></div>
                <div>
                    <h6 class="text-uppercase text-muted mb-1">Total Pemasukan</h6>
                    <h3 class="mb-0 fw-bold text-success">
                        Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengeluaran -->
    <div class="col-md-4">
        <div class="card summary-card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="summary-icon text-danger me-3"><i class="bi bi-cash-stack"></i></div>
                <div>
                    <h6 class="text-uppercase text-muted mb-1">Total Pengeluaran</h6>
                    <h3 class="mb-0 fw-bold text-danger">
                        Rp {{ number_format($totalExpense ?? 0, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Saldo Akhir -->
    <div class="col-md-4">
        <div class="card summary-card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="summary-icon text-primary me-3"><i class="bi bi-piggy-bank"></i></div>
                <div>
                    <h6 class="text-uppercase text-muted mb-1">Saldo Akhir</h6>
                    <h3 class="mb-0 fw-bold text-primary">
                        Rp {{ number_format($balance ?? 0, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Daftar Pemasukan & Pengeluaran Terbaru -->
<div class="row mt-5">
    <!-- Pemasukan -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header fw-semibold">Pemasukan Terbaru</div>
            <div class="card-body p-3">
                <table class="table table-modern mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Sumber</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Income::where('user_id', Auth::id())->latest()->take(5)->get() as $i)
                            <tr>
                                <td>{{ $i->source ?? $i->nama }}</td>
                                <td class="text-success fw-semibold">
                                    Rp {{ number_format($i->amount ?? $i->jumlah, 0, ',', '.') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($i->tanggal ?? $i->created_at)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                        @if(\App\Models\Income::where('user_id', Auth::id())->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">Belum ada data pemasukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pengeluaran -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header fw-semibold">Pengeluaran Terbaru</div>
            <div class="card-body p-3">
                <table class="table table-modern mb-0 align-middle">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Expense::where('user_id', Auth::id())->latest()->take(5)->get() as $e)
                            <tr>
                                <td>{{ $e->category ?? $e->nama }}</td>
                                <td class="text-danger fw-semibold">
                                    Rp {{ number_format($e->amount ?? $e->jumlah, 0, ',', '.') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($e->tanggal ?? $e->created_at)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                        @if(\App\Models\Expense::where('user_id', Auth::id())->count() == 0)
                            <tr>
                                <td colspan="3" class="text-center py-3 text-muted">Belum ada data pengeluaran</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection