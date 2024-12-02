<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Purchase;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'customer' => 'required|numeric',
            'transaction' => 'required|numeric',
            'date' => 'required|date'
        ]);

        if ($valid->fails()) {
            return back()->with('error', $valid->errors()->first());
        }

        $data = $valid->validated();

        try {
            Purchase::create([
                'customer_id' => $data['customer'],
                'purchase_date' => $data['date'],
                'total_price' => $data['transaction']
            ]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', 'Successfully input new transaction');
    }

    public function total_transaction()
    {
        $transactions = Customer::select(
            'customers.customer_name',
            'customers.customer_email',
            'customers.customer_phone',
            'customers.customer_address',
            DB::raw('SUM(purchases.total_price) AS total_purchase')
        )->join('purchases', 'customers.customer_id', 'purchases.customer_id')
            ->groupBy('customers.customer_id')
            ->groupBy('customers.customer_name')
            ->groupBy('customers.customer_email')
            ->groupBy('customers.customer_phone')
            ->groupBy('customers.customer_address')
            ->get();

        return view('purchases', [
            'transactions' => $transactions
        ]);
    }
}
