<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Member;
use App\Models\Book;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index()
    {
        $transactions = Transaction::with('member', 'book')->get();
        return view('transactions.index', compact('transactions'));
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create()
    {
        $members = Member::all();
        $books = Book::all();
        return view('transactions.create', compact('members', 'books'));
    }

    // Menyimpan transaksi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date', // Ganti borrow_date menjadi borrowed_at
            'due_date' => 'required|date|after:borrowed_at', // Pastikan ada kolom due_date di tabel
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        Transaction::create($request->only(['member_id', 'book_id', 'borrowed_at', 'due_date']));
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    // Menampilkan detail transaksi tertentu
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    // Menampilkan form untuk mengedit transaksi
    public function edit(Transaction $transaction)
    {
        $members = Member::all();
        $books = Book::all();
        return view('transactions.edit', compact('transaction', 'members', 'books'));
    }

    // Memperbarui data transaksi di database
    public function update(Request $request, Transaction $transaction)
{
    $request->validate([
        'member_id' => 'required|exists:members,id',
        'book_id' => 'required|exists:books,id',
        'borrowed_at' => 'required|date',
        'due_date' => 'required|date|after:borrowed_at',
        'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
    ]);

    $transaction->update($request->only(['member_id', 'book_id', 'borrowed_at', 'due_date', 'returned_at']));
    return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
}


    // Menghapus transaksi dari database
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
