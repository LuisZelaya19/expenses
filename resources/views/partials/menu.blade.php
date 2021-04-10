<section class="min-h-screen bg-gray-50">
	<nav class="fixed top-0 left-0 z-20 h-full pb-10 overflow-x-hidden overflow-y-auto bg-gray-900 transition origin-left transform w-60 md:translate-x-0" :class="{ '-translate-x-full' : !sideBar, 'translate-x-0' : sideBar }" @click.away="sideBar = false">
		<nav class="text-sm font-medium text-gray-500" aria-label="Main Navigation">
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200" href="#">
				<span> <i class="fas fa-home"></i> Home</span>
			</a>
			@can('user_administration_access')
			<div x-data="collapse()">
				<div class="flex items-center justify-between px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200" role="button" x-spread="trigger">
					<div class="flex items-center">
						<span>
							<i class="fas fa-users-cog"></i> Administracion de usuarios
						</span>
					</div>
					<i class="fas fa-angle-right" :class="{'fa-rotate-90': open}"></i>
				</div>
				<div class="mb-4" x-spread="collapse" x-cloak>
					@can('user_access')
					<a class="flex items-center py-2 pl-12 pr-4 cursor-pointer transition hover:bg-gray-800 hover:text-gray-200" {{request()->is('admin/users*') ? 'bg-gray-800 text-gray-200' : ''}} href="{{route('users.index')}}">
						<span><i class="fas fa-users"></i> Usuarios
						</span>
					</a>
					@endcan
					@can('role_access')
					<a class="flex items-center py-2 pl-12 pr-4 cursor-pointer transition hover:bg-gray-800 hover:text-gray-200" {{request()->is('admin/roles*') ? 'bg-gray-800 text-gray-200' : ''}} href="{{route('roles.index')}}">
						<span><i class="fas fa-briefcase"></i> Roles
						</span>
					</a>
					@endcan
					@can('permission_access')
					<a class="flex items-center py-2 pl-12 pr-4 cursor-pointer transition hover:bg-gray-800 hover:text-gray-200" href="{{route('permissions.index')}}">
						<span><i class="fas fa-user-lock"></i> Permisos
						</span>
					</a>
					@endcan
					@can('module_access')
					<a class="flex items-center py-2 pl-12 pr-4 cursor-pointer transition hover:bg-gray-800 hover:text-gray-200" href="{{route('modules.index')}}">
						<span><i class="fas fa-cogs"></i> Modulos</span>
					</a>
					@endcan
				</div>
			</div>
			@endcan
			@can('expense_category_access')
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200 {{request()->is('admin/expenseCategories*') ? 'bg-gray-800 text-gray-200' : ''}}" href="{{route('expenseCategories.index')}}">
				<span><i class="fas fa-th"></i> Categoria de gastos</span>
			</a>
			@endcan
			@can('income_category_access')
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200 {{request()->is('admin/incomeCategories*') ? 'bg-gray-800 text-gray-200' : ''}}"" href=" {{route('incomeCategories.index')}}">
				<span><i class="fas fa-th"></i> Categoria de ingresos</span>
			</a>
			@endcan
			@can('expense_access')
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200 {{request()->is('admin/expenses*') ? 'bg-gray-800 text-gray-200' : ''}}" href="{{route('expenses.index')}}">
				<span><i class="fas fa-th"></i> Gastos</span>
			</a>
			@endcan
			@can('income_access')
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200 {{request()->is('admin/incomes*') ? 'bg-gray-800 text-gray-200' : ''}}" href="{{route('incomes.index')}}">
				<span><i class="fas fa-th"></i> Ingresos</span>
			</a>
			@endcan
			<a class="flex items-center px-4 py-3 cursor-pointer transition group hover:bg-gray-800 hover:text-gray-200" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
				<span><i class=" fas fa-sign-out-alt"></i> Cerrar sesion</span>
			</a>
		</nav>
	</nav>
	<div class="ml-0 transition md:ml-60">

	</div> <!-- Sidebar Backdrop -->
	<div class="fixed inset-0 z-10 w-screen h-screen bg-black bg-opacity-25 md:hidden" x-show.transition="sideBar" x-cloak></div>
</section>
