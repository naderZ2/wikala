<div class="sidebar-wrapper">
	<div style="  max-height: 100vh;" >
		<div class="logo-wrapper">
			<a href="{{route('seller.home')}}"><img class="img-fluid for-light" src="{{asset('logo.png')}}" alt="" height="50" width="50" alt=""><img class="img-fluid for-dark" src="{{asset('logo.png')}}" alt="" height="50" width="50" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
						<div  class="logo-icon-wrapper"><a href="{{route('seller.home')}}"><img class="img-fluid" src="{{asset('logo.png')}}" alt="" height="50" width="50" alt=""></a></div>

		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				
				<ul class="sidebar-links" id="simple-bar">
					
					<!--<li class="back-btn ">-->
					<!--	<a href="{{ route('seller.home') }}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>-->
					<!--	<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>-->
					<!--</li>-->



					<li class="sidebar-list">
						<label class="badge badge-success"></label>
						<a class="sidebar-link sidebar-title {{ Str::contains(Route::currentRouteName() ,'seller.home') ? 'active' : '' }}" href="#"></i><span class="lan-3"> @lang('lang.Dashboard')</span>

							<div class="according-menu"><i class="fa fa-angle-{{  Str::contains(Route::currentRouteName() ,'seller.home' ) ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ Str::contains(Route::currentRouteName() ,'seller.home') ? 'block;' : 'none;' }}">




							<li><a href="{{route('index')}}" class="{{ Route::currentRouteName()=='seller.home' ? 'active' : '' }}">@lang('lang.Home') </a></li> 
									  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ request()->route()->uri() == 'seller/seller_services/index' ? 'active' : '' }}" href="#"><i data-feather="server"></i>
								<span class="lan-7">{{ trans('lang.seller_services') }}</span>
								<div class="according-menu"><i class="fa fa-angle-{{ request()->route()->uri() == 'seller/seller_services/index' ? 'down' : 'right' }}"></i></div>
							</a>
						
					</li>
							
							{{-- <li><a class="lan-4 {{ Route::currentRouteName()=='seller.product.create' ? 'active' : '' }}" href="{{route('seller.product.create')}}"> 
							@lang('lang.add_Product')</a></li>
							<li><a class="lan-4 {{ Route::currentRouteName()=='seller.product.index' ? 'active' : '' }}" href="{{route('seller.product.index')}}"> 
							@lang('lang.Products')</a></li> --}}
{{-- 
							<li><a class="lan-4 {{ Route::currentRouteName()=='seller.order.index' ? 'active' : '' }}" href="{{route('seller.order.index')}}"> 
								@lang('lang.All_Orders') </a></li>

							<li><a href="{{ route('seller.order.new') }}" class="{{ Route::currentRouteName() == 'seller.order.new' ? 'active' : '' }}">@lang('lang.New_Orders')</a></li>

							<li><a href="{{ route('seller.order.completed') }}" class="{{ Route::currentRouteName() == 'seller.order.completed' ? 'active' : '' }}">@lang('lang.Completed_Orders')</a></li>

							<li><a href="{{ route('seller.order.under_preparation') }}" class="{{ Route::currentRouteName() == 'seller.order.under_preparation' ? 'active' : '' }}">@lang('lang.Under_Preparation_Orders')</a></li> --}}

							{{-- <li><a class="lan-4 {{ Route::currentRouteName()=='category.index' ? 'active' : '' }}" href="{{route('category.index')}}">{{ "category" }}</a></li>
							<li><a class="lan-4 {{ Route::currentRouteName()=='category.create' ? 'active' : '' }}" href="{{route('category.create')}}">{{ "add category" }}</a></li> --}}
						</ul>
					</li>


					{{-- @dd(Str::contains( Route::currentRouteName() ,'seller.order') ) --}}

					<li class="sidebar-list">
						{{-- <a class="sidebar-link sidebar-title {{  request()->route()->getPrefix() == '/orders' ? 'active' : '' }}" href="#"><i data-feather="shopping-bag"></i> --}}
						<a class="sidebar-link sidebar-title {{ Str::contains(Route::currentRouteName() ,'seller.order' ) ? 'active' : '' }}" href="#"><i data-feather="shopping-bag"></i>
						<span class="lan-7">{{ trans('lang.Orders') }}</span>
							<div class="according-menu"><i class="fa fa-angle-{{  Str::contains(Route::currentRouteName() ,'seller.order' ) ? 'down' : 'right' }}"></i></div>
						</a>
						
	                    <ul class="sidebar-submenu" style="display: {{  Str::contains(Route::currentRouteName() ,'seller.order' )  ? 'block;' : 'none;' }}">

							<li><a href="{{ route('seller.order.index') }}" class="{{ Route::currentRouteName() == 'seller.order.index' ? 'active' : '' }}">@lang('lang.All_Orders')</a></li>

							<li><a href="{{ route('seller.order.new') }}" class="{{ Route::currentRouteName() == 'seller.order.new' ? 'active' : '' }}">@lang('lang.New_Orders')</a></li>

							<li><a href="{{ route('seller.order.completed') }}" class="{{ Route::currentRouteName() == 'seller.order.completed' ? 'active' : '' }}">@lang('lang.Completed_Orders')</a></li>

							<li><a href="{{ route('seller.order.under_preparation') }}" class="{{ Route::currentRouteName() == 'seller.order.under_preparation' ? 'active' : '' }}">@lang('lang.Under_Preparation_Orders')</a></li>
	                    </ul>
                  	</li>


					

					  <li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{ Str::contains(Route::currentRouteName() ,'seller.product') ? 'active' : '' }}" href="#"><i data-feather="shopping-bag"></i>
							<span class="lan-7">{{ trans('lang.Products')}}</span>
							<div class="according-menu"><i class="fa fa-angle-{{ Str::contains(Route::currentRouteName() ,'seller.product') ? 'down' : 'right' }}"></i></div>
						</a>
						
	                    <ul class="sidebar-submenu" style="display: {{ Str::contains(Route::currentRouteName() ,'seller.product') ? 'block;' : 'none;' }}">
	                        	<li><a href="{{ route('seller.sellerServices.index') }}" class="{{ Route::currentRouteName() == 'seller.sellerServices.index' ? 'active' : '' }}">{{ trans('lang.seller_services') }}</a></li>

							<li><a class="lan-4 {{ Route::currentRouteName()=='seller.product.create' ? 'active' : '' }}" href="{{route('seller.product.create')}}"> 
								@lang('lang.add_Product')</a></li>

								
								<li><a class="lan-4 {{ Route::currentRouteName()=='seller.product.index' ? 'active' : '' }}" href="{{route('seller.product.index')}}"> 
								@lang('lang.Products')</a></li>

							
							{{-- 	<li><a href="{{ route('product.index') }}" class="{{ Route::currentRouteName() == 
								'product.index' ? 'active' : '' }}">@lang('lang.Products')</a></li> --}}



								{{-- <li><a class="lan-4 {{ Route::currentRouteName()=='product.create' ? 'active' : '' }}" href="{{route('product.create')}}"> 
									@lang('lang.add_Product')</a></li> --}}
						</ul>
                  	</li>
				
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>