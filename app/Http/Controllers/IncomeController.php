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
            'source' => 'required',
            'amount' => 'required|numeric',
            'description' => 'nullable'
        ]);

        Income::create([
            'user_id' => Auth::id(),
            'source' => $request->source,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Data pemasukan ditambahkan');
    }

    // Hanya SATU method edit
    public function edit(Income $income)
    {
        // kalau belum pakai policy, hapus dulu baris authorize
        // $this->authorize('update', $income);
        return view('incomes.edit', compact('income'));
    }

    public function update(Request $request, Income $income)
    {
        $income->update($request->all());
        return redirect()->route('incomes.index')->with('success', 'Data pemasukan diperbarui');
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Data dihapus');
    }
}
