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
						    	 <li><a href="<?php echo e(route('settings.edit')); ?>" class="<?php echo e(Route::currentRouteName()=='settings.edit' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.settings'); ?> </a></li> 
							<li><a href="<?php echo e(route('city.index')); ?>" class="<?php echo e(Route::currentRouteName()=='city.index' ? 'active' : ''); ?>"> <?php echo app('translator')->get('lang.regions'); ?> </a></li>
							<!--<li><a href="<?php echo e(route('city.create')); ?>" class="<?php echo e(Route::currentRouteName()=='city.create' ? 'active' : ''); ?>"><?php echo app('translator')->get('lang.add_region'); ?></a></li>-->
							
							
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='slider.index' ? 'active' : ''); ?>" href="<?php echo e(route('slider.index')); ?>"><?php echo app('translator')->get('lang.slider'); ?></a></li>
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='banner.index' ? 'active' : ''); ?>" href="<?php echo e(route('banner.index')); ?>"><?php echo app('translator')->get('lang.banner'); ?></a></li>-->
							<!--<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='banner.create' ? 'active' : ''); ?>" href="<?php echo e(route('banner.create')); ?>"><?php echo app('translator')->get('lang.add_banner'); ?></a></li>-->

							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='category.index' ? 'active' : ''); ?>" href="<?php echo e(route('category.index')); ?>"><?php echo app('translator')->get('lang.Categories'); ?></a></li>
							<li><a class="lan-4 <?php echo e(Route::currentRouteName()=='home_page_category.index' ? 'active' : ''); ?>" href="<?php echo e(route('home_page_category.index')); ?>"><?php echo app('translator')->get('lang.home_page_categories'); ?></a></li>

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
						<a class="sidebar-link sidebar-title <?php echo e((request()->route()->uri() == 'users/admins')||(request()->route()->uri() =='users/roles') ? 'active' : ''); ?>" href="#">
							<i data-feather="user-check"></i>
							

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
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'dashboard/attributes' ? 'active' : ''); ?>" href="#">
							<i data-feather="tag"></i>
							<span class="lan-7"><?php echo e(trans('lang.Attributes')); ?></span>
							<div class="according-menu">
								<i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'dashboard/attributes' ? 'down' : 'right'); ?>"></i>
							</div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/attributes' ? 'block;' : 'none;'); ?>">
							<li>
								<a href="<?php echo e(route('attributes.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'attributes' ? 'active' : ''); ?>">
									<?php echo e(trans('lang.Attributes')); ?>

								</a>
							</li>
						</ul>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/attributes' ? 'block;' : 'none;'); ?>">
							<li>
								<a href="<?php echo e(route('category-attributes.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'category-attributes' ? 'active' : ''); ?>">
									<?php echo e(trans('lang.category_attributes')); ?>

								</a>
							</li>
						</ul>

					
					</li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'dashboard/report-options' ? 'active' : ''); ?>" href="#">
							
							<i data-feather="alert-triangle"></i> 
							
							<span class="lan-7"><?php echo e(trans('lang.report_options')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'dashboard/report-options' ? 'down' : 'right'); ?>"></i></div>
						</a>
						
	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/reports' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('admin.reports.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'reports' ? 'active' : ''); ?>"><?php echo e(trans('lang.reports')); ?></a></li>
						</ul>

						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/reports/report-options' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('reportOption.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'report-options' ? 'active' : ''); ?>"><?php echo e(trans('lang.report_options')); ?></a></li>
					  </ul>
                 </li>


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'dashboard/rejected-reasons' ? 'active' : ''); ?>" href="#">
							<i data-feather="x-circle"></i>
							<span class="lan-7"><?php echo e(trans('lang.rejected_reasons')); ?></span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'dashboard/rejected-reasons' ? 'down' : 'right'); ?>"></i></div>
						</a>
						
	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/rejected-reasons' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('rejected-reasons.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'rejected-reasons' ? 'active' : ''); ?>"><?php echo e(trans('lang.rejected_reasons')); ?></a></li>
                      </ul>
	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/ads_type' ? 'block;' : 'none;'); ?>">
							<li><a href="<?php echo e(route('ads_type.index')); ?>" class="<?php echo e(Route::currentRouteName() == 'ads_type' ? 'active' : ''); ?>"><?php echo e(trans('lang.ads_type')); ?></a></li>
                      </ul>
					  
                 </li>


				 <li class="sidebar-list">
					<a class="sidebar-link sidebar-title <?php echo e(request()->route()->uri() == 'dashboard/ads' ? 'active' : ''); ?>" href="#">
						<i data-feather="radio"></i>
						<span class="lan-7"><?php echo e(trans('lang.ads')); ?></span>
						<div class="according-menu">
							<i class="fa fa-angle-<?php echo e(request()->route()->uri() == 'dashboard/ads' ? 'down' : 'right'); ?>"></i>
						</div>
					</a>
				
					<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->uri() == 'dashboard/ads' ? 'block' : 'none;'); ?>">
						<li>
							<a href="<?php echo e(route('ads.index')); ?>" class="<?php echo e(request('status') == null ? 'active' : ''); ?>">
								<?php echo e(trans('lang.all_ads')); ?>

							</a>
						</li>
						<li>
							<a href="<?php echo e(route('ads.index', ['status' => 'accepted'])); ?>" class="<?php echo e(request('status') === 'accepted' ? 'active' : ''); ?>">
								<?php echo e(trans('lang.accepted')); ?>

							</a>
						</li>
						<li>
							<a href="<?php echo e(route('ads.index', ['status' => 'under_review'])); ?>" class="<?php echo e(request('status') === 'under_review' ? 'active' : ''); ?>">
								<?php echo e(trans('lang.under_review')); ?>

							</a>
						</li>
						<li>
							<a href="<?php echo e(route('ads.index', ['status' => 'rejected'])); ?>" class="<?php echo e(request('status') === 'rejected' ? 'active' : ''); ?>">
								<?php echo e(trans('lang.rejected')); ?>

							</a>
						</li>
						<li>
							<a href="<?php echo e(route('ads.index', ['status' => 'outdated'])); ?>" class="<?php echo e(request('status') === 'outdated' ? 'active' : ''); ?>">
								<?php echo e(trans('lang.outdated')); ?>

							</a>
						</li>
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
</div>




<?php /**PATH C:\Users\HP\OneDrive\Desktop\_\codeing\work\mazen\wikala\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>