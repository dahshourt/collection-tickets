</div>
<!--end::Content-->
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    </div>
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->

		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-left p-10">
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">User Profile</h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<div class="offcanvas-content pr-5 mr-n5">
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url('{{ asset('public/avatar.png')}}')"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="{{ url('/') }}" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ auth()->user()->first_name; }}</a>
						<div class="navi mt-2">
							<a href="{{ url('/signout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
						</div>
					</div>
				</div>
				<div class="separator separator-dashed mt-8 mb-5"></div>
			</div>
		</div>
		<!-- end::User Panel-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
		</div>
		<!--end::Scrolltop-->

		<script>var HOST_URL = "#";</script>
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#6993FF", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#1BC5BD", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#E1E9FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>

		<script src="{{ asset('public/new_design/assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/js/scripts.bundle.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/js/pages/widgets.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/js/pages/crud/datatables/basic/scrollable.js')}}"></script>
		<script src="{{ asset('public/new_design/assets/js/pages/crud/datatables/basic/paginations.js')}}"></script>
		<script src="{{ asset('public/jquery-ui.js')}}"></script>

        @include('templates.toastr')

		@stack('script')

		<script>
		const baseUrl = "{{ url('workflows') }}";
        $('._remove').on('click', function () {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are You Sure?',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                showCancelButton: true,
                showCloseButton: true,
                target: document.getElementById('rtl-container')
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `${baseUrl}/${id}`,
                        type: 'DELETE',
                        data: { '_token': $('meta[name="csrf-token"]').attr('content') },
                        success: function (response) {
                            if (response.status === 'success') {
                                Swal.fire({ position: 'center', icon: 'success', title: 'Deleted Successfully', showConfirmButton: false, timer: 2000 });
                                window.location.reload();
                            } else {
                                Swal.fire({ position: 'center', icon: 'error', title: response.message, showConfirmButton: false, timer: 2000 });
                            }
                        },
                        error: function () {
                            Swal.fire({ position: 'center', icon: 'error', title: 'Something went wrong!', showConfirmButton: false, timer: 2000 });
                        }
                    });
                }
            });
        });

		function add_new_settlement_fields() {
    		$('#error_message').text('');
			if($('#transaction_amount').val()) {
				$message_content = `<div class='row'><div class="col-md-5" id='settlement_account'><input type="text" name="settlement_accounts[]" class="form-control" placeholder="Account"></div><div class="col-md-7" id='settlement'><input type="text" value="" name="settlement[]" class="form-control amount-formate" placeholder="Amount" /></div></div>`;
				$("#settlement_fields").append($message_content);
			} else {
				$('#error_message').text("please fill transaction Amount Firstly");
			}
		}

		$("#transaction_type").change(function(){
			var creator_group_id = $("#creator_group_id").val();
			if(this.value == 3){ $("#cheque_number").show(); } else { $("#cheque_number").hide(); }
			$.get("{{url("/transaction/workflow")}}", { transaction_type_id: this.value, creator_group_id: creator_group_id })
			.done(function(data) { $("#workflow-group-status").html(data); });
		});

		$("#creator_group_id").change(function(){
			var transaction_type_id = $("#transaction_type").val();
			$.get("{{url("/transaction/workflow")}}", { transaction_type_id: transaction_type_id, creator_group_id: this.value })
			.done(function(data) { $("#workflow-group-status").html(data); });
		});

		$("#rejection_reason_id").change(function(){
			$(':button[type="submit"]').prop('disabled', true);
			var creator_group_id = $("#creator_group_id").val();
			var current_group = $(this).data('currentgroup');
			var current_status = $(this).data('currentstatus');
			var previous_group_id = $(this).data('previousgroup');
			var transaction_type_id = $(this).data('transactiontype');
			$.get("{{url("/workflow/status/group")}}", { transfer_status: this.value, creator_group_id: creator_group_id, current_group: current_group, current_status: current_status, previous_group_id: previous_group_id, transaction_type_id: transaction_type_id })
			.done(function(data) {
				$("#status-group").html(data);
				$(':button[type="submit"]').prop('disabled', false);
			});
			if(this.value == 4){ $("#dropdown_reason").show(); } else { $("#dropdown_reason").hide(); }
			if(this.value == 10){ $(".add_on_oracle").show(); } else { $(".add_on_oracle").hide(); }
		});

		$("#rejection_reason_value").change(function(){
			if(this.value == 4){ $("#rejection_reason_comment").show(); } else { $("#rejection_reason_comment").hide(); }
		});

		$(function() {
			$("#datepicker").datepicker({ dateFormat: "d-M-yy" });
		});

		$(".nav-item").click(function(){
			KTLayoutAsideToggle.init('kt_aside_toggle');
			KTLayoutAsideMenu.init('kt_aside_menu');
		});

		$("#e1").select2();
		$("#e1").trigger("change");
		</script>

	</body>
	<!--end::Body-->

    <!-- ══ Administration Logs Modal (global — available on every page) ══ -->
    <div class="modal fade" id="logModal" tabindex="-1" role="dialog" aria-labelledby="logModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="logModalLabel">
                        <i class="fa fa-history mr-1"></i>
                        <span id="logModalTitle">Administration Logs</span>
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0" style="max-height:70vh; overflow-y:auto;">
                    <div id="logModalBody" class="p-3">
                        <div class="text-center py-5">
                            <div class="spinner-border text-secondary" role="status"></div>
                            <p class="mt-2 text-muted">Loading logs&hellip;</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <small class="text-muted mr-auto">Showing latest 100 entries &mdash; most recent first</small>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    /**
     * showLogs(category, section)
     *
     * Supported categories:
     *   'Ticket'   — ticket create, update, export, view
     *   'Report'   — report search and export
     *   'User'     — user create, update, active/inactive
     *   'Group'    — group create, update, active/inactive
     *   'Workflow' — workflow rules create, update, delete
     *   'Category' — custom fields create, update, delete
     *
     * @param {string} category
     * @param {string} [section]  optional sub-section e.g. 'CM Report', 'Tickets'
     */
    function showLogs(category, section) {
        var title = (section ? section : category) + ' Logs';
        document.getElementById('logModalTitle').textContent = title;

        $('#logModalBody').html(
            '<div class="text-center py-5">' +
            '<div class="spinner-border text-secondary" role="status"></div>' +
            '<p class="mt-2 text-muted">Loading logs&hellip;</p>' +
            '</div>'
        );
        $('#logModal').modal('show');

        var params = { category: category };
        if (section) { params.section = section; }

        $.ajax({
            url: "{{ route('administration.logs') }}",
            type: "GET",
            data: params,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                $('#logModalBody').html(response.html);
            },
            error: function(xhr) {
                if (xhr.status === 403) {
                    $('#logModalBody').html('<div class="alert alert-danger m-3">You do not have permission to view logs.</div>');
                } else {
                    var msg = 'Failed to load logs. Please try again.';
                    try {
                        var json = JSON.parse(xhr.responseText);
                        if (json.html) { msg = json.html; }
                    } catch(e) {}
                    $('#logModalBody').html('<div class="alert alert-warning m-3">' + msg + '</div>');
                }
            }
        });
    }
    </script>
</html>
