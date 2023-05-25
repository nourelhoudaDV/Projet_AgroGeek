<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
		data-kt-scroll-activate="true" data-kt-scroll-height="auto"
		data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
		data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
		<!--begin::Menu-->
		<div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
			data-kt-menu-expand="false">
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item here show ">
				<!--begin:Menu link-->
				<a class="menu-link" >
					
					<span class="menu-title">Dashboards</span>
				
				</a>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
			
				<!--end:Menu sub-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div class="menu-item pt-5">
				<!--begin:Menu content-->
				<div class="menu-content">
					<span class="menu-heading fw-semibold text-uppercase fs-7">Pages</span>
				</div>
				<!--end:Menu content-->
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title" style="color:#5EC267">Fermes</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('fermes.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Listes Fermes</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('fermes.create') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Ajouter nouveau ferme</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

				<!--end:Menu sub-->
				
				</div>
			</div>
			{{-- </div> --}}
			<!--end:Menu item-->
		<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title" style="color:#5EC267">Especes</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('especes.index') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Listes especes</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('especes.create') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Ajouter nouveau espece</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

				<!--end:Menu sub-->
				</div>
			</div>
			<!--end:Menu item-->
			<!--begin:Menu item-->
			<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
				<!--begin:Menu link-->
				<span class="menu-link">
					<span class="menu-icon">{!! getSvgIcon('duotune/communication/com005.svg', 'svg-icon svg-icon-2') !!}</span>
					<span class="menu-title" style="color:#5EC267">Culture Parcelle</span>
					<span class="menu-arrow"></span>
				</span>
				<!--end:Menu link-->
				<!--begin:Menu sub-->
				<div class="menu-sub menu-sub-accordion">
				
					<!--begin:Menu item-->
					<div class="menu-item">
						<!--begin:Menu link-->
						<a class="menu-link" href="{{ route('cultureparcelle.create') }}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">Ajouter nouveau culture parcelle</span>
						</a>
						<!--end:Menu link-->
					</div>
					<!--end:Menu item-->

				<!--end:Menu sub-->
				</div>
			</div>
					<!--end:Menu item-->
	

		</div>
		<!--end::Menu-->
	</div>
	<!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
