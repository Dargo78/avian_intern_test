<?php

use App\Http\Controllers\TransactionController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/input', function() {
    $customer = Customer::all();
    return view('input', [
        'customers' => $customer
    ]);
})->name('transaction.input');

Route::get('/transactions', [TransactionController::class, 'total_transaction'])->name('transaction.data');
Route::post('/transaction', [TransactionController::class, 'transaction'])->name('transaction');
