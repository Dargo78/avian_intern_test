<nav
    class="navbar fixed top-0 flex w-full h-[65px] flex-nowrap items-center justify-between bg-white backdrop-blur-sm p-2 shadow-dark-mild lg:flex-wrap lg:justify-start duration-300 transition-all ease-in-out">
    <div class="flex w-full flex-wrap items-center justify-center md:px-3 duration-300 transition-all ease-in-out">
        <div class="flex flex-row gap-10 nav-items">
            <a href="{{ route('transaction.input') }}"
                class="py-3 px-5 rounded-xl duration-150 ease-in text-black text-lg font-bold hover:bg-slate-200 {{ Route::is('transaction.input') ? 'bg-slate-200' : '' }}">
                <span>Input transaction</span>
            </a>
            <a href="{{ route('transaction.data') }}"
                class="py-3 px-5 rounded-xl duration-150 ease-in text-black text-lg font-bold hover:bg-slate-200 {{ Route::is('transaction.data') ? 'bg-slate-200' : '' }}">
                <span>Transactions</span>
            </a>
        </div>
    </div>
</nav>
