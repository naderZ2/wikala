<div class="sidebar-wrapper">
	<div style="  max-height: 100vh;">
		<div class="logo-wrapper">
			<a href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('logo.png')); ?>" alt="" height="50" width="50" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('logo.png')); ?>" alt="" height="50" width="50" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('logo.png')); ?>" alt="" height="50" width="50" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('/')); ?>"><img class="img-fluid"src="<?php echo e(asset('logo.png')); ?>" alt="" height="50" width="50" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					
					<li class="sidebar-list">
						<label class="badge badge-success"></label><a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'active' : ''); ?>" href="#"><i data-feather="home"></i><span class="lan-3"> <?php echo app('translator')->get('lang.Dashboard'); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;'); ?>">
						    	 <li><a href="<?php echo e(route('settings.edit')); ?>" class="<?php echo e(Route::currentRouteName()=='settings.edit' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.contact_us'); ?> </a></li> 
							<li><a href="<?php echo e(route('city.index')); ?>" class="<?php echo e(Route::currentRouteName()=='city.index' ? 'active' : ''); ?>"> <?php echo app('translator')->get('lang.regions'); ?> </a></li>
							<!--<li><a href="<?php echo e(route('city.create')); ?>" class="<?php echo e(Route::currentRouteName()=='city.create' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.add_region'); ?></a></li>-->
							
							
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='slider.index' ? 'active' : ''); ?>" href="<?php echo e(route('slider.index')); ?>"><?php echo app('translator')->get('lang.slider'); ?></a></li>
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='banner.index' ? 'active' : ''); ?>" href="<?php echo e(route('banner.index')); ?>"><?php echo app('translator')->get('lang.banner'); ?></a></li>-->
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='banner.create' ? 'active' : ''); ?>" href="<?php echo e(route('banner.create')); ?>"><?php echo app('translator')->get('lang.add_banner'); ?></a></li>-->

							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='category.index' ? 'active' : ''); ?>" href="<?php echo e(route('category.index')); ?>"><?php echo app('translator')->get('lang.Categories'); ?></a></li>
							<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add category')): ?>-->
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='category.create' ? 'active' : ''); ?>" href="<?php echo e(route('category.create')); ?>"><?php echo app('translator')->get('lang.add_Category'); ?></a></li>-->
							<!--<?php endif; ?>	-->
							
							
								
							<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add category')): ?>-->
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='event_category.create' ? 'active' : ''); ?>" href="<?php echo e(route('event_category.create')); ?>">add event category</a></li>-->
							<!--<?php endif; ?>	-->
							
						
							
							<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add discount')): ?>-->
							<!--<li><a href="<?php echo e(route('discounts.create')); ?>" class="<?php echo e(Route::currentRouteName()=='discounts.create' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.add_discount'); ?> </a></li>-->
							<!--<?php endif; ?>	-->
						</ul>
					</li>
					


					


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'discounts' ? 'active' : ''); ?>" href="#"><i data-feather="dollar-sign"></i>
							<span class="lan-7"><?php echo app('translator')->get('lang.discounts'); ?> </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'discounts' ? 'down' : 'right'); ?>"></i></div>
						</a>

	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'discounts' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('discounts.index')); ?>" class="<?php echo e(Route::currentRouteName()=='discounts.index' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.discounts'); ?> </a></li>

                      </ul>
                  	</li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/events' ? 'active' : ''); ?>" href="#"><i data-feather="calendar"></i>
							<span class="lan-7"><?php echo app('translator')->get('lang.events'); ?> </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/events' ? 'down' : 'right'); ?>"></i></div>
						</a>

	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/events' ? 'block;' : 'none;'); ?>">
	                        	<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='event_category.index' ? 'active' : ''); ?>" href="<?php echo e(route('event_category.index')); ?>"><?php echo e(trans('lang.events_category')); ?></a></li>
							
								<li><a class="lan-4 <?php echo e(request()->get('eventiFlter') == 'under_review' ? 'active' : ''); ?>" href="<?php echo e(route('daily_events.index', ['eventiFlter' => 'under_review'] )); ?>"><?php echo e(trans('lang.under_review')); ?></a></li>
							<li><a class="lan-4 <?php echo e(request()->get('eventiFlter') == 'approved' ? 'active' : ''); ?>" href="<?php echo e(route('daily_events.index', ['eventiFlter' => 'approved'] )); ?>"><?php echo e(trans('lang.approved')); ?></a></li>
						
							<li><a class="lan-4 <?php echo e(request()->get('eventiFlter') == 'expired' ? 'active' : ''); ?>" href="<?php echo e(route('daily_events.index', ['eventiFlter' => 'expired'] )); ?>"><?php echo e(trans('lang.expired')); ?></a></li>
							<li><a class="lan-4 <?php echo e(request()->get('eventiFlter') == 'rejected' ? 'active' : ''); ?>" href="<?php echo e(route('daily_events.index', ['eventiFlter' => 'rejected'] )); ?>"><?php echo e(trans('lang.rejected_events')); ?></a></li>


						
						

                      </ul>
                  	</li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e((request()->route()->uri() == 'users/admins')||(request()->route()->uri() =='users/roles') ? 'active' : ''); ?>" href="#"><i data-feather="users"></i>
							<span class="lan-7"><?php echo e(trans('lang.admins')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e((request()->route()->uri() == 'users/admins')||(request()->route()->uri() =='users/roles') ? 'down' : 'right'); ?>"></i></div>
						</a>
	                	<ul class="sidebar-submenu" style="display: <?php echo e((request()->route()->uri() == 'users/admins')||(request()->route()->uri() =='users/roles') ? 'block;' : 'none;'); ?>">
                        	<li><a href="<?php echo e(route('admins.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'admins.index' ? 'active' : ''); ?>"><?php echo e(trans('lang.admins')); ?></a></li>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles')): ?>
									<li><a href="<?php echo e(route('roles.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'roles.index' ? 'active' : ''); ?>"><?php echo e(trans('lang.Roles')); ?></a></li>
							<?php endif; ?>	
                    	</ul>
                	</li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'users/clients' ? 'active' : ''); ?>" href="#"><i data-feather="users"></i>
							<span class="lan-7"><?php echo e(trans('lang.Clients')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'users/clients' ? 'down' : 'right'); ?>"></i></div>
						</a>
						
	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'users/clients' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('admin.clients')); ?>" class="<?php echo e(Route::currentRouteName() == 'admin.clients' ? 'active' : ''); ?>"><?php echo e(trans('lang.Clients')); ?></a></li>
                      </ul>
                  	</li>


			
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'users/seller' ? 'active' : ''); ?>" href="#"><i data-feather="users"></i>
							<span class="lan-7"><?php echo e(trans('lang.Sellers')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'users/seller' ? 'down' : 'right'); ?>"></i></div>
						</a>

	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'users/seller' ? 'block;' : 'none;'); ?>">
                          <li><a href="<?php echo e(route('seller.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'seller.index' ? 'active' : ''); ?>"><?php echo e(trans('lang.Sellers')); ?></a></li>

                      </ul>
                  	</li>

					  

					  

					<li class="sidebar-list">
						
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/evaluations' ? 'block' : 'none;'); ?>;">
							
							
						</ul>
					</li>

				

					<li class="sidebar-list">
						
						
							
						
							
							
							
						
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/financial' ? 'block' : 'none;'); ?>;">
							
						</ul>

						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/financial' ? 'block' : 'none;'); ?>;">
							
						</ul>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/financial' ? 'block' : 'none;'); ?>;">
							
						</ul>
					</li>
					
					<li class="sidebar-list">
						
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/settings' ? 'block' : 'none;'); ?>;">
							
						</ul>
						
					</li>

					


					<li class="sidebar-list">
					    
						<a class="sidebar-link sidebar-title <?php echo e((request()->route()->uri() == 'orders/products')||(request()->route()->uri() == 'orders/products/create') ? 'active' : ''); ?>" href="#"><i data-feather="shopping-bag"></i>
							<span class="lan-7"><?php echo e(trans('lang.Products')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e((request()->route()->uri() == 'orders/products')||(request()->route()->uri() == 'orders/products/create') ? 'down' : 'right'); ?>"></i></div>
						</a>

						
	                    <ul class="sidebar-submenu" style="display: <?php echo e((request()->route()->uri() == 'orders/products')||(request()->route()->uri() == 'orders/products/create') ? 'block;' : 'none;'); ?>">
                          <li><a href="<?php echo e(route('admin.sellerServices.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'admin.sellerServices.index' ? 'active' : ''); ?>"><?php echo e(trans('lang.seller_services')); ?></a></li>

							
							<li><a href="<?php echo e(route('product.index')); ?>" class="<?php echo e(Route::currentRouteName() == 
								'product.index' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.Products'); ?></a></li>



								<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='product.create' ? 'active' : ''); ?>" href="<?php echo e(route('product.create')); ?>"> 
									<?php echo app('translator')->get('lang.add_Product'); ?></a></li>


									
						</ul>
                  	</li>

					  
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'orders/orders' ? 'active' : ''); ?>" href="#"><i data-feather="shopping-bag"></i>
							<span class="lan-7"><?php echo e(trans('lang.Orders')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'orders/orders' ? 'down' : 'right'); ?>"></i></div>
						</a>
						
	                              <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/orders' ? 'block;' : 'none;'); ?>">

							<li><a href="<?php echo e(route('order.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'order.index' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.All_Orders'); ?></a></li>

							<li><a href="<?php echo e(route('order.new')); ?>" class="<?php echo e(Route::currentRouteName() == 'order.new' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.New_Orders'); ?></a></li>

							<li><a href="<?php echo e(route('order.completed')); ?>" class="<?php echo e(Route::currentRouteName() == 'order.completed' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.Completed_Orders'); ?></a></li>

							<li><a href="<?php echo e(route('order.under_preparation')); ?>" class="<?php echo e(Route::currentRouteName() == 'order.under_preparation' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.Under_Preparation_Orders'); ?></a></li>
	                    </ul>
                  	</li>



					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/notifications' ? 'active' : ''); ?>" href="#">
							<i data-feather="bell"></i><span><?php echo app('translator')->get('lang.Notifications'); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/notifications' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/notifications' ? 'block' : 'none;'); ?>;">
							<li><a href="<?php echo e(route('admin.notifications.index')); ?>" class="<?php echo e(Route::currentRouteName()=='admin.notifications.index' ? 'active' : ''); ?>">  <?php echo app('translator')->get('lang.Notifications'); ?></a></li>
							<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add notification')): ?>-->
							<!--<li><a href="<?php echo e(route('admin.notifications.create')); ?>" class="<?php echo e(Route::currentRouteName()=='admin.notifications.create' ? 'active' : ''); ?>">  <?php echo app('translator')->get('lang.add_Notification'); ?> </a></li>-->
							<!--<?php endif; ?>	-->
						</ul>
					</li>
					

					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\ezhalhaUpTo9\ezhalha\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>