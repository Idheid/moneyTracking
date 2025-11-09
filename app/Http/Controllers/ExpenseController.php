<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    // Menampilkan daftar semua pengeluaran milik user yang login
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::id())->get();
        return view('expenses.index', compact('expenses'));
    }

    // Menampilkan form tambah pengeluaran
    public function create()
    {
        return view('expenses.create');
    }

    // Menyimpan data pengeluaran baru
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0|max:9999999999999.99',
            'description' => 'nullable|string|max:500',
        ], [
            'amount.max' => 'Jumlah terlalu besar. Nilai maksimal adalah 9.999.999.999.999,99.',
            'amount.numeric' => 'Kolom jumlah harus berupa angka.',
        ]);

        Expense::create([
            'user_id' => Auth::id(),
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    // Menampilkan form edit untuk data tertentu
    public function edit(Expense $expense)
    {
        // Nonaktifkan sementara jika belum punya policy
        // $this->authorize('update', $expense);
        return view('expenses.edit', compact('expense'));
    }

    // Memperbarui data pengeluaran
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'category' => 'required',
            'amount' => 'required|numeric',
            'description' => 'nullable'
        ]);

        $expense->update([
            'category' => $request->category,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    // Menghapus data pengeluaran
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}
