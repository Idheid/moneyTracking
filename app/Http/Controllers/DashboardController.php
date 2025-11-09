<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalIncome = Income::where('user_id', Auth::id())->sum('amount');
        $totalExpense = Expense::where('user_id', Auth::id())->sum('amount');
        $balance = $totalIncome - $totalExpense;

        return view('dashboard', compact('totalIncome', 'totalExpense', 'balance'));
    }
}
