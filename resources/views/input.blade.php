@extends('layout')

@section('content')
<h1 class="text-3xl font-bold mb-3">Input transaksi</h1>
    <form class="bg-white p-10 rounded-xl shadow-lg" action="{{ route('transaction') }}" method="POST">
        @csrf
        <label for="">Customer</label>
        <select name="customer"
            class="w-full bg-transparent text-gray-900 border border-black rounded-md p-2 mb-3 focus:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150">
            @foreach ($customers as $customer)
                <option value="{{ $customer->customer_id }}">{{ $customer->customer_name }}</option>
            @endforeach
        </select>
        <label>Total transaksi</label>
        <input type="number" name="transaction" placeholder="transaction" id="transaction"
            class="block min-h-[auto] w-full rounded bg-transparent border border-black px-3 py-[0.32rem] mb-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none" />

        <label>Tanggal</label>
        <input type="date" name="date" placeholder="date" id="date"
            class="block min-h-[auto] w-full rounded bg-transparent border border-black px-3 py-[0.32rem] mb-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none" />

        <button class="px-3 py-1 rounded-lg border bg-blue-500" type="submit">Submit</button>
    </form>
@endsection
