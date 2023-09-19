<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dateParam = $request->query('date', now()->toDateString());

        $selectedDate = Carbon::parse($dateParam);

        $transactions = Transaction::whereDate('date', $selectedDate)->orderBy('created_at', 'desc')->get();

        $totalAmount = $transactions->sum('amount');
        $incomeTotal = $transactions->where('type_id', 1)->sum('amount');
        $expensesTotal = $transactions->where('type_id', 2)->sum('amount');

        $balance = $incomeTotal - $expensesTotal;

        return view('dashboard.transactions.index', compact('transactions', 'incomeTotal', 'expensesTotal', 'balance', 'selectedDate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = TransactionType::all();

        return view('dashboard.transactions.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'type_id' => 'required',
            'amount' => 'required|integer',
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'desc' => 'nullable|max:255'
        ]);

        // $validatedData['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');

        $validatedData['user_id'] = auth()->user()->id;

        Transaction::create($validatedData);

        return redirect('/dashboard/transactions?date=' . $request->date)->with('success', 'New item has been added!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $types = TransactionType::all();

        return view('dashboard.transactions.edit', compact('types', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'date' => 'required|date_format:Y-m-d',
            'type_id' => 'required',
            'amount' => 'required|integer',
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'desc' => 'nullable|max:255'
        ];

        $validatedData = $request->validate($rules);

        // $validatedData['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');

        $validatedData['user_id'] = auth()->user()->id;

        Transaction::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/transactions?date=' . $request->date)->with('success', 'Item has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        Transaction::destroy($id);

        return redirect('/dashboard/transactions?date=' . $transaction->date)->with('success', 'Item has been deleted!');
    }
}
