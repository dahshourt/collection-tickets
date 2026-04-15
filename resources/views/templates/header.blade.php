
<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Collection Tickets</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link href="{{ asset('public/new_design/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('public/new_design/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('public/new_design/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/new_design/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('public/new_design/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->


		<link rel="shortcut icon" href="{{ asset('public/new_design/assets/media/logos/favicon.ico')}}" />
		<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/jquery-ui.css')}}"    />
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
<script src="assets/plugins/global/plugins.bundle.js"></script>
		<style>
			.form-control-feedback
			{
				color: red;
			}
			.dataTables_wrapper table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before
			{
				content: unset !important;
			}
			.add_on_oracle
			{
				display:none;
			}
			.form-control[readonly] {
				color: #7E8299 !important;
				background-color: #EBEDF3 !important;
			}
			.odd .sorting_1 .checkbox > span
			{
				background-color: #ffff !important;
			}
			.odd .sorting_1 .checkbox > input:checked ~ span {
				background-color: #1BC5BD !important;
			}
			
		</style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile">
			<!--begin::Logo-->
			<a href="{{ url('/') }}">
				<img alt="Logo" src="{{ asset('public/logo.jpg')}}" class="logo-default max-h-30px" />
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">



