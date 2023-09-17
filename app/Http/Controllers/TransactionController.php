<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        return view('dashboard.transactions.index', compact('transactions'));
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
            'date' => 'required|date_format:d/m/Y',
            'type_id' => 'required',
            'amount' => 'required|integer',
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'desc' => 'required|max:255'
        ]);

        $validatedData['date'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validatedData['date'])->format('Y-m-d');

        $validatedData['user_id'] = auth()->user()->id;

        Transaction::create($validatedData);

        return redirect('/dashboard/transactions')->with('success', 'New item has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
