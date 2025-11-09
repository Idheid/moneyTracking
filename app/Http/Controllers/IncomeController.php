<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::id())->get();
        return view('incomes.index', compact('incomes'));
    }

    public function create()
    {
        return view('incomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0|max:9999999999999.99',
            'description' => 'nullable|string|max:500',
        ], [
            'amount.max' => 'Jumlah terlalu besar. Nilai maksimal adalah 9.999.999.999.999,99.',
            'amount.numeric' => 'Kolom amount harus berupa angka.',
        ]);

        Income::create([
            'user_id' => Auth::id(),
            'source' => $request->source,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $request->validate([
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0|max:9999999999999.99',
            'description' => 'nullable|string|max:500',
        ], [
            'amount.max' => 'Jumlah terlalu besar. Nilai maksimal adalah 9.999.999.999.999,99.',
            'amount.numeric' => 'Kolom amount harus berupa angka.',
        ]);

        $income->update([
            'source' => $request->source,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Data pemasukan berhasil dihapus.');
    }
}
