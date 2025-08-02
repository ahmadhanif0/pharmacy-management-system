<!-- Sidebar -->
<style>
	.btn-color {
		background-color: #1f1e1e;
		border: none;
		color: #fff;
	}

	.btn-color:hover {
		background-color: #333330;
		border: none;
		color: #fff;
	}

	.active-tab {
		background-color: #ff9e35;
		color: #fff;
	}
</style>
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu mt-2">

			<ul>
				<li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">
					<a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>

				@can('view-category')
					<li class="{{ Request::routeIs('categories') ? 'active' : '' }}">
						<a href="{{route('categories')}}"><i class="fe fe-layout"></i> <span>Categories</span></a>
					</li>
				@endcan

				@can('view-products')
					<li class="submenu">
						<a href="#"><i class="fe fe-document"></i> <span> Products</span> <span
								class="menu-arrow"></span></a>
						<ul style="display: none;">
							@can('view-products')
								<li><a class="{{ Request::routeIs(('products')) ? 'active' : '' }}"
							href="{{route('products')}}">Products</a></li>@endcan
							@can('create-product')
								<li><a class="{{ Request::routeIs('add-product') ? 'active' : '' }}"
							href="{{route('add-product')}}">Add Product</a></li>@endcan
							@can('view-outstock-products')
								<li><a class="{{ Request::routeIs('outstock') ? 'active' : '' }}"
							href="{{route('outstock')}}">Out-Stock</a></li>@endcan
							@can('view-expired-products')
								<li><a class="{{ Request::routeIs('expired') ? 'active' : '' }}"
							href="{{route('expired')}}">Expired</a></li>@endcan
						</ul>
					</li>
				@endcan

				@can('view-purchase')
					<li class="submenu">
						<a href="#"><i class="fe fe-star-o"></i> <span> Purchase</span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="{{ Request::routeIs('purchases') ? 'active' : '' }}"
									href="{{route('purchases')}}">Purchase</a></li>
							@can('create-purchase')
								<li><a class="{{ Request::routeIs('add-purchase') ? 'active' : '' }}"
										href="{{route('add-purchase')}}">Add Purchase</a></li>
							@endcan
						</ul>
					</li>
				@endcan
				@can('view-sales')
					<li><a class="{{ Request::routeIs('sales') ? 'active' : '' }}" href="{{route('sales')}}"><i
								class="fe fe-activity"></i> <span>Sales</span></a></li>
				@endcan

				@can('view-returns')
					<li class="submenu">
						<a href="#"><i class="fa fa-undo" style="font-size:18px;"></i> <span> Returns</span> <span
								class="menu-arrow"></span></a>
						<ul style="display: none;">
							@can('view-returns')
								<li>
									<a class="{{ Request::routeIs('returns.index') ? 'active' : '' }}"
										href="{{ route('returns.index') }}">Returns</a>
								</li>
							@endcan

							@can('create-returns')
								<li>
									<a class="{{ Request::routeIs('returns.select-sale') ? 'active' : '' }}"
										href="{{ route('returns.select-sale') }}">Select Sale</a>
								</li>
							@endcan
						</ul>
					</li>
				@endcan

				@can('view-product-exchange')
					<li class="submenu">
						<a href="#"><i class="fa fa-exchange-alt" style="font-size:18px"></i>
							<span>Exchanges</span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li>
								<a class="{{ Request::routeIs('product_exchanges.index') ? 'active' : '' }}"
									href="{{ route('product_exchanges.index') }}">
									Exchanges
								</a>
							</li>
							@can('create-product-exchange')
								<li>
									<a class="{{ Request::routeIs('product_exchanges.select-sale') ? 'active' : '' }}"
										href="{{ route('product_exchanges.select-sale') }}">
										Select Sale
									</a>
								</li>
							@endcan
						</ul>
					</li>
				@endcan


				@can('view-supplier')
					<li class="submenu">
						<a href="#"><i class="fe fe-user"></i> <span> Supplier</span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="{{ Request::routeIs('suppliers') ? 'active' : '' }}"
									href="{{route('suppliers')}}">Supplier</a></li>
							@can('create-supplier')
								<li><a class="{{ Request::routeIs('add-supplier') ? 'active' : '' }}"
							href="{{route('add-supplier')}}">Add Supplier</a></li>@endcan
						</ul>
					</li>
				@endcan

				@can('view-reports')
					<li class="submenu">
						<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span
								class="menu-arrow"></span></a>
						<ul style="display: none;">
							<li><a class="{{ Request::routeIs('reports') ? 'active' : '' }}"
									href="{{route('reports')}}">Reports</a></li>
						</ul>
					</li>
				@endcan

				@can('view-access-control')
					<li class="submenu">
						<a href="#"><i class="fe fe-lock"></i> <span> Access Control</span> <span
								class="menu-arrow"></span></a>
						<ul style="display: none;">
							@can('view-permission')
								<li><a class="{{ Request::routeIs('permissions') ? 'active' : '' }}"
										href="{{route('permissions')}}">Permissions</a></li>
							@endcan
							@can('view-role')
								<li><a class="{{ Request::routeIs('roles') ? 'active' : '' }}"
										href="{{route('roles')}}">Roles</a></li>
							@endcan
						</ul>
					</li>
				@endcan

				@can('view-users')
					<li class="{{ Request::routeIs('users') ? 'active' : '' }}">
						<a href="{{route('users')}}"><i class="fe fe-users"></i> <span>Users</span></a>
					</li>
				@endcan

				<li class="{{ Request::routeIs('profile') ? 'active' : '' }}">
					<a href="{{route('profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				</li>
				@can('view-settings')
					<li class="{{ Request::routeIs('settings') ? 'active' : '' }}">
						<a href="{{route('settings')}}">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								stroke="currentColor" stroke-width="1" class="bi bi-gear" viewBox="0 0 16 16">
								<path
									d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
								<path
									d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
							</svg>
							<span> Settings</span>
						</a>
					</li>
				@endcan
			</ul>
			<form action="{{ url('logout') }}" method="GET" class="d-flex justify-content-center">
				@csrf
				<button class="btn btn-color btn-sm mb-1 mt-2">Logout</button>
			</form>
		</div>
	</div>
</div>
<!-- /Sidebar -->