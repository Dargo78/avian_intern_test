@extends('layout')

@section('content')
    <h1 class="font-bold text-3xl mb-3">Data transaksi</h1>
    <div class="flex flex-col w-full py-8 rounded-lg shadow-xl items-center justify-center mb-10 px-10 bg-white">
        <div class="w-full relative mb-3 mx-5" data-te-input-wrapper-init>
            <input type="search"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0 dark:autofill:shadow-autofill"
                id="datatable-search-input" placeholder="Search" />
            <label for="datatable-search-input"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Search
            </label>
        </div>

        <div id="datatable" class="relative w-full py-5 z-[2]" data-te-fixed-header="true"></div>

    </div>
@endsection
@section('script')
    <script>
        const dataTable = document.getElementById('datatable');
        const transactions = @json($transactions);

        const column = [{
            label: "Name",
            field: "customer_name",
            sort: true
        }, {
            label: "Email",
            field: "customer_email",
            sort: true
        }, {
            label: "Phone number",
            field: "customer_phone",
            sort: true
        }, {
            label: "Address",
            field: "customer_address",
            sort: true
        }];

        const table = new te.Datatable(
            dataTable, {
                columns: column,
                rows: transactions.map((item) => {
                    return {
                        ...item,
                    }
                })
            }, {
                hover: true,
                stripped: true
            },
        );

        document.getElementById('datatable-search-input').addEventListener('input', (e) => {
            table.search(e.target.value);
        });
    </script>
@endsection
