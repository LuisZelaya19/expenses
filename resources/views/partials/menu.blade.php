<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gray-900 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="mx-2 text-2xl font-semibold text-white">Control de ingresos y gastos</span>
        </div>
    </div>

    <nav class="mt-10">
        <a class="flex items-center px-6 py-2 mt-4 text-gray-100 bg-gray-700 bg-opacity-25" href="/">

            <span class="mx-3">Dashboard</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{route('incomes.index')}}">
            <span class="mx-3"><i class="fas fa-money-bill-wave"></i> Ingresos</span>
        </a>

        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{route('expenses.index')}}">
            <span class="mx-3"><i class="fas fa-money-bill-wave"></i> Gastos<span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{route('incomeCategories.index')}}">
            <span class="mx-3">Categoria de ingresos</span>
        </a>
        <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" href="{{route('expenseCategories.index')}}">
            <span class="mx-3">Categoria de gastos</span>
        </a>
        <a href="#" class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <span class="mx-3">
                <i class="fas fa-sign-out-alt">
                </i> Cerrar sesion
            </span>
        </a>

    </nav>
</div>
