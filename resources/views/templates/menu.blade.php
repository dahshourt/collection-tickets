<!--begin::Aside-->
@php
$creator_group = [1,10];
$user_groups = auth()->user()->UserGroups->pluck('group_id')->toArray();
$result = !empty(array_intersect($creator_group, $user_groups));
@endphp
				<div class="aside aside-left d-flex aside-fixed" id="kt_aside">
					<!--begin::Primary-->
					<div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
						<!--begin::Brand-->
						<div class="aside-brand d-flex flex-column align-items-center flex-column-auto py-5 py-lg-12">
							<!--begin::Logo-->

							<a href="{{ url('/') }}">
								<img alt="Logo" src="{{ asset('public/logo.jpg')}}" class="max-h-30px" />
							</a>
							<!--end::Logo-->
						</div>
						<!--end::Brand-->
						<!--begin::Nav Wrapper-->
						<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid py-5 scroll scroll-pull">
							<!--begin::Nav-->
							<ul class="nav flex-column" role="tablist">
								<!--begin::Item-->
								<li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Home">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab" data-target="#kt_aside_tab_1" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
													<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>
								<!--end::Item-->
								
								<!--begin::Item-->
								<li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Metronic Features">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg active" data-toggle="tab" data-target="#kt_aside_tab_2" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>
								<!--end::Item-->
								<!--begin::Item-->
								{{--  <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Latest Reports">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab" data-target="#kt_aside_tab_3" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
													<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
													<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
													<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>  --}}
								<!--end::Item-->
								<!--begin::Item-->
								{{--  <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Project Management">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab" data-target="#kt_aside_tab_4" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
													<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>  --}}
								<!--end::Item-->
								<!--begin::Item-->
								{{--  <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="User Management">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab" data-target="#kt_aside_tab_5" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000" />
													<rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>  --}}
								<!--end::Item-->
								<!--begin::Item-->
								{{--  <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Finance &amp; Accounting">
									<a href="#" class="nav-link btn btn-icon btn-clean btn-lg" data-toggle="tab" data-target="#kt_aside_tab_6" role="tab">
										<span class="svg-icon svg-icon-xl">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24" />
													<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</a>
								</li>  --}}
								<!--end::Item-->
							</ul>
							<!--end::Nav-->
						</div>
						<!--end::Nav Wrapper-->
						<!--begin::Footer-->
						<div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-4 py-lg-10">
							<!--begin::Aside Toggle-->
							<span class="aside-toggle btn btn-icon btn-primary btn-hover-primary shadow-sm" id="kt_aside_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Toggle Aside">
								<i class="ki ki-bold-arrow-back icon-sm"></i>
							</span>
							<!--end::Aside Toggle-->
							<!--begin::Quick Actions-->
							{{--  <a href="#" class="btn btn-icon btn-clean btn-lg mb-1" id="kt_quick_actions_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Quick Actions">
								<span class="svg-icon svg-icon-xl">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
											<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
											<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
											<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</a>  --}}
							<!--end::Quick Actions-->
							<!--begin::Quick Panel-->
							{{--  <a href="#" class="btn btn-icon btn-clean btn-lg mb-1 position-relative" id="kt_quick_panel_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Quick Panel">
								<span class="svg-icon svg-icon-xl">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
											<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
								<span class="label label-sm label-light-danger label-rounded font-weight-bolder position-absolute top-0 right-0 mt-1 mr-1">3</span>
							</a>  --}}
							<!--end::Quick Panel-->
							<!--begin::User-->
							<a href="#" class="btn btn-icon btn-clean btn-lg w-40px h-40px" id="kt_quick_user_toggle" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="User Profile">
								<span class="symbol symbol-30 symbol-lg-40">
									<span class="svg-icon svg-icon-xl">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
									<!--<span class="symbol-label font-size-h5 font-weight-bold">S</span>-->
								</span>
							</a>
							<!--end::User-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Primary-->
					<!--begin::Secondary-->
					<div class="aside-secondary d-flex flex-row-fluid">
						<!--begin::Workspace-->
						<div class="aside-workspace scroll scroll-push my-2">
							<!--begin::Tab Content-->
							<div class="tab-content">
								<!--begin::Tab Pane-->
								<div class="tab-pane p-3 px-lg-7 py-lg-5 fade" id="kt_aside_tab_1">
									<!--begin::Form-->
									{{--  <form class="p-2 p-lg-3">
										<div class="d-flex">
											<div class="input-icon h-40px">
												<input type="text" class="form-control form-control-lg form-control-solid h-40px" placeholder="Search..." id="generalSearch" />
												<span>
													<span class="svg-icon svg-icon-lg">
														<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</span>
											</div>
											<div class="dropdown" data-toggle="tooltip" title="Quick actions" data-placement="left">
												<a href="#" class="btn btn-icon btn-default btn-hover-primary ml-2 h-40px w-40px flex-shrink-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<span class="svg-icon svg-icon-lg">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24" />
																<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
																<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</a>
												<div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
													<!--begin::Navigation-->
													<ul class="navi navi-hover py-5">
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-drop"></i>
																</span>
																<span class="navi-text">New Group</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-list-3"></i>
																</span>
																<span class="navi-text">Contacts</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-rocket-1"></i>
																</span>
																<span class="navi-text">Groups</span>
																<span class="navi-link-badge">
																	<span class="label label-light-primary label-inline font-weight-bold">new</span>
																</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-bell-2"></i>
																</span>
																<span class="navi-text">Calls</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-gear"></i>
																</span>
																<span class="navi-text">Settings</span>
															</a>
														</li>
														<li class="navi-separator my-3"></li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-magnifier-tool"></i>
																</span>
																<span class="navi-text">Help</span>
															</a>
														</li>
														<li class="navi-item">
															<a href="#" class="navi-link">
																<span class="navi-icon">
																	<i class="flaticon2-bell-2"></i>
																</span>
																<span class="navi-text">Privacy</span>
																<span class="navi-link-badge">
																	<span class="label label-light-danger label-rounded font-weight-bold">5</span>
																</span>
															</a>
														</li>
													</ul>
													<!--end::Navigation-->
												</div>
											</div>
										</div>
									</form>  --}}
									<!--end::Form-->
									{{--  <h3 class="p-2 p-lg-3 my-1 my-lg-3">Projects</h3>  --}}
									<!--begin::List-->
									{{--  <div class="list list-hover">
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/006-plurk.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">Bravio Application</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By James</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/010-vimeo.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">Quick Reports</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By Ana</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/014-kickstarter.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">CRM Reporting Tool</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By Adam</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/009-hot-air-balloon.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">DB Management</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By CRA Team</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/008-infography.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">Cloud Service</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By iC Team</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/007-disqus.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">Disqus Project</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By PV Inc.</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
										<!--begin::Item-->
										<div class="list-item hoverable p-2 p-lg-3 mb-2">
											<div class="d-flex align-items-center">
												<!--begin::Symbol-->
												<div class="symbol symbol-40 symbol-light mr-4">
													<span class="symbol-label bg-hover-white">
														<img src="{{asset('assets/media/svg/misc/006-plurk.svg')}}" class="h-50 align-self-center" />

													</span>
												</div>
												<!--end::Symbol-->
												<!--begin::Text-->
												<div class="d-flex flex-column flex-grow-1 mr-2">
													<span class="text-dark-75 font-size-h6 mb-0">Plurk Meeting</span>
													<a href="#" class="text-muted text-hover-primary font-weight-bold">By Plurk Team.</a>
												</div>
												<!--begin::End-->
											</div>
										</div>
										<!--end::Item-->
									</div>  --}}
									<!--end::List-->
								</div>
								<!--end::Tab Pane-->
								<!--begin::Tab Pane-->
								<div class="tab-pane fade active show" id="kt_aside_tab_2">
									<!--begin::Aside Menu-->
									<div class="aside-menu-wrapper flex-column-fluid px-3 px-lg-10 py-5" id="kt_aside_menu_wrapper">
										<!--begin::Menu Container-->
										<div id="kt_aside_menu" class="aside-menu min-h-lg-800px" data-menu-vertical="1" data-menu-scroll="1">
											<!--begin::Menu Nav-->
											<ul class="menu-nav">
												<li class="menu-item menu-item-active" aria-haspopup="true">
													<a href="{{ url('/') }}" class="menu-link">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24" />
																	<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
																	<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Home</span>
													</a>
												</li>
												<li class="menu-section">
													<h4 class="menu-text">Settings</h4>
													<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
												</li>
												<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
													<a href="javascript:;" class="menu-link menu-toggle">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
																	<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Tickets</span>
														<i class="menu-arrow"></i>
													</a>
													<div class="menu-submenu">
														<i class="menu-arrow"></i>
														<ul class="menu-subnav">
															<li class="menu-item menu-item-parent" aria-haspopup="true">
																<span class="menu-link">
																	<span class="menu-text">Tickets</span>
																</span>
															</li>
															@if($result)
															<li class="menu-item" aria-haspopup="true">
																<a href="{{url('tickets/create_ticket')}}" class="menu-link">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">create</span>
																</a>
															</li>
															@endif
															
															<li class="menu-item" aria-haspopup="true">
																<a href="{{url('tickets')}}" class="menu-link">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">List Tickets</span>
																</a>
															</li>
															@if($result)
															<li class="menu-item" aria-haspopup="true">
																<a href="{{url('tickets/myTickets')}}" class="menu-link">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">My Tickets</span>
																</a>
															</li>
															@endif
														</ul>
													</div>
												</li>
												<?php  $user = Auth::user();?>
												  @if ($user->role == '1')
												<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
													<a href="javascript:;" class="menu-link menu-toggle">
														<span class="svg-icon menu-icon">

															<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																	<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														
																	 
														<span class="menu-text">Settings</span>
														<i class="menu-arrow"></i>
													</a>
													<div class="menu-submenu">
														<i class="menu-arrow"></i>
														<ul class="menu-subnav">
															<li class="menu-item menu-item-parent" aria-haspopup="true">
																<span class="menu-link">
																	<span class="menu-text">Users</span>
																</span>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Users</span>
																	<span class="menu-label">
																		{{--  <span class="label label-rounded label-primary">6</span>  --}}
																	</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('users.create_users')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">create User</span>
																			</a>
																		</li>

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('users.index')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text"> Users</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">groups</span>
																	<span class="menu-label">
																		{{--  <span class="label label-rounded label-primary">6</span>  --}}
																	</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('groups.create_group')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">create group</span>
																			</a>
																		</li>


																	</ul>
																</div>

																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('groups.index')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text"> groups</span>
																			</a>
																		</li>

																	
																	</ul>
																</div>
																
															</li>

															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">workflows</span>
																	<span class="menu-label">
																		{{--  <span class="label label-rounded label-primary">6</span>  --}}
																	</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('workflows.create')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">create workflow</span>
																			</a>
																		</li>


																	</ul>
																</div>

																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{route('workflows.index')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text"> workflows</span>
																			</a>
																		</li>

																	
																	</ul>
																</div>
																
															</li>
															
															{{--  <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Profile</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																			<a href="javascript:;" class="menu-link menu-toggle">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Profile 1</span>
																				<i class="menu-arrow"></i>
																			</a>
																			<div class="menu-submenu">
																				<i class="menu-arrow"></i>
																				<ul class="menu-subnav">
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/profile/profile-1/overview.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Overview</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/profile/profile-1/personal-information.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Personal Information</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/profile/profile-1/account-information.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Account Information</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/profile/profile-1/change-password.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Change Password</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/profile/profile-1/email-settings.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Email Settings</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/profile/profile-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Profile 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/profile/profile-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Profile 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/profile/profile-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Profile 4</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Contacts</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/contacts/list-columns.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Columns</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/contacts/list-datatable.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Datatable</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/contacts/view-contact.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">View Contact</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/contacts/add-contact.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Add Contact</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/contacts/edit-contact.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Edit Contact</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Projects</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/list-columns-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Columns 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/list-columns-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Columns 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/list-columns-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Columns 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/list-columns-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Columns 4</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/list-datatable.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">List - Datatable</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/view-project.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">View Project</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/add-project.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Add Project</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/projects/edit-project.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Edit Project</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Support Center</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/home-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Home 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/home-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Home 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/faq-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">FAQ 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/faq-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">FAQ 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/faq-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">FAQ 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/feedback.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Feedback</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/support-center/license.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">License</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Chat</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/chat/private.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Private</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/chat/group.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Group</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/chat/popup.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Popup</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Todo</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/todo/tasks.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Tasks</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/todo/docs.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Docs</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/todo/files.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Files</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Education</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																			<a href="javascript:;" class="menu-link menu-toggle">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">School</span>
																				<i class="menu-arrow"></i>
																			</a>
																			<div class="menu-submenu">
																				<i class="menu-arrow"></i>
																				<ul class="menu-subnav">
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/dashboard.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Dashboard</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/statistics.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Statistics</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/calendar.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Calendar</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/library.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Library</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/teachers.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Teachers</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/school/students.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Students</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</li>
																		<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																			<a href="javascript:;" class="menu-link menu-toggle">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Student</span>
																				<i class="menu-arrow"></i>
																			</a>
																			<div class="menu-submenu">
																				<i class="menu-arrow"></i>
																				<ul class="menu-subnav">
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/student/dashboard.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Dashboard</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/student/profile.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Profile</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/student/calendar.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Calendar</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/apps/education/student/classmates.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-line">
																								<span></span>
																							</i>
																							<span class="menu-text">Classmates</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/education/class/dashboard.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Class</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">eCommerce</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/dashboard.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Dashboard 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/dashboard-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Dashboard 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/dashboard-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Dashboard 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/product-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Product 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/product-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Product 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/product-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Product 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/product-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">My Orders</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/order-details.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Order Details</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/shopping-cart.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Shopping Cart</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/apps/ecommerce/checkout.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Checkout</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item" aria-haspopup="true">
																<a href="custom/apps/inbox.html" class="menu-link">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text">Inbox</span>
																	<span class="menu-label">
																		<span class="label label-danger label-inline">new</span>
																	</span>
																</a>
															</li>  --}}
														</ul>
													</div>
													
												</li>
												@endif
												<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
													<a href="javascript:;" class="menu-link menu-toggle">
														<span class="svg-icon menu-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Barcode-read.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24" />
																	<rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16" />
																	<path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
														<span class="menu-text">Reports</span>

														<i class="menu-arrow"></i>
													</a>
													<div class="menu-submenu">
														<i class="menu-arrow"></i>
														<ul class="menu-subnav">
															<li class="menu-item menu-item-parent" aria-haspopup="true">
																<span class="menu-link">
																	<span class="menu-text">Reports</span>
																</span>
															</li>
															<li class="menu-item" aria-haspopup="true">
																			<a href="{{url('report/entp-report')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Enterprise collection </span>
																			</a>
															</li>
															{{-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>

																	<span class="menu-text">Reports</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">

																	<li class="menu-item" aria-haspopup="true">
																			<a href="{{url('report/cm-report')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">CM report </span>
																			</a>
																	</li> 
																		<li class="menu-item" aria-haspopup="true">
																			<a href="{{url('report/entp-report')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Enterprise collection </span>
																			</a>
																		</li>
                                                                        <!-- <li class="menu-item" aria-haspopup="true">
																			<a href="{{url('report/collection-report')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Collection cheque </span>
																			</a>
																		</li> -->
                                                                        <li class="menu-item" aria-haspopup="true">
																			<a href="{{url('report/cash-report')}}" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Cash Operation </span>
																			</a>
																		</li> 

																				</ul>
																			</div>
																		</li>--}}
																		<!-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																			<a href="javascript:;" class="menu-link menu-toggle">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>

																				<span class="menu-text">CM report</span>
																				<span class="menu-label">
																					<span class="label label-inline label-info">Wizard</span>
																				</span>
																				<i class="menu-arrow"></i>
																			</a>
																			<div class="menu-submenu">
																				<i class="menu-arrow"></i>
																				<ul class="menu-subnav">
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/login-4/signup.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Sign Up</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/login-4/signin.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Sign In</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/login-4/forgot.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Forgot Password</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</li> -->
																		<!-- <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																			<a href="javascript:;" class="menu-link menu-toggle">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Classic</span>
																				<i class="menu-arrow"></i>
																			</a>
																			<div class="menu-submenu">
																				<i class="menu-arrow"></i>
																				<ul class="menu-subnav">
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-1.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 1</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-2.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 2</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-3.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 3</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-4.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 4</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-5.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 5</span>
																						</a>
																					</li>
																					<li class="menu-item" aria-haspopup="true">
																						<a href="custom/pages/login/classic/login-6.html" class="menu-link">
																							<i class="menu-bullet menu-bullet-dot">
																								<span></span>
																							</i>
																							<span class="menu-text">Login 6</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</li> -->
																	</ul>
																</div>
															</li>
															{{--  <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">Wizard</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 4</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-5.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 5</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/wizard/wizard-6.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Wizard 6</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">Pricing Tables</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/pricing/pricing-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Pricing Tables 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/pricing/pricing-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Pricing Tables 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/pricing/pricing-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Pricing Tables 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/pricing/pricing-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Pricing Tables 4</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">Invoices</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 4</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-5.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 5</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/invoices/invoice-6.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Invoice 6</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>
															<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
																<a href="javascript:;" class="menu-link menu-toggle">
																	<i class="menu-bullet menu-bullet-dot">
																		<span></span>
																	</i>
																	<span class="menu-text">Error</span>
																	<i class="menu-arrow"></i>
																</a>
																<div class="menu-submenu">
																	<i class="menu-arrow"></i>
																	<ul class="menu-subnav">
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-1.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 1</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-2.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 2</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-3.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 3</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-4.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 4</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-5.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 5</span>
																			</a>
																		</li>
																		<li class="menu-item" aria-haspopup="true">
																			<a href="custom/pages/error/error-6.html" class="menu-link">
																				<i class="menu-bullet menu-bullet-dot">
																					<span></span>
																				</i>
																				<span class="menu-text">Error 6</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</li>  --}}
														</ul>
													</div>
												</li>
												
												
												</li>
											</ul>
											<!--end::Menu Nav-->
										</div>
										<!--end::Menu Container-->
									</div>
									<!--end::Aside Menu-->
								</div>
								<!--end::Tab Pane-->
							</div>
							<!--end::Tab Content-->
						</div>
						<!--end::Workspace-->
					</div>
					<!--end::Secondary-->
				</div>
				<!--end::Aside-->

<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper" style="height: 100%">

<!--begin::Content-->


<!--begin::Wrapper-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
