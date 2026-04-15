{{--
  Reusable Logs Modal Partial
  ──────────────────────────
  Include at the BOTTOM of any page that needs a Logs button.

  Usage:
    @include('partials.logs_modal')

  Trigger button (place anywhere on the page):
    <button class="btn btn-warning" onclick="showLogs('Report','CM Report')">
        <i class="fa fa-history"></i> Logs
    </button>
    OR:
    <button class="btn btn-warning" onclick="showLogs('Group')">
        <i class="fa fa-history"></i> Logs
    </button>
--}}

<!-- ══ LOGS MODAL ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="logsModal" tabindex="-1" role="dialog"
     aria-labelledby="logsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="logsModalLabel">
          <i class="fa fa-history mr-1"></i>
          <span id="logsModalTitle">System Logs</span>
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-0" style="max-height:70vh; overflow-y:auto;">
        <div id="logsModalContent" class="p-3">
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

<!-- ══ GLOBAL showLogs() FUNCTION ══════════════════════════════════════════ -->
<script>
/**
 * showLogs(category, section)
 *
 * Opens the logs modal and fetches entries for the given category / section.
 *
 * @param {string} category  - 'User' | 'Group' | 'Workflow' | 'Report'
 * @param {string} [section] - optional sub-section, e.g. 'CM Report'
 */
function showLogs(category, section) {
    var title = (section ? section : category) + ' Logs';
    document.getElementById('logsModalTitle').textContent = title;

    $('#logsModalContent').html(
        '<div class="text-center py-5">' +
        '<div class="spinner-border text-secondary" role="status"></div>' +
        '<p class="mt-2 text-muted">Loading logs&hellip;</p>' +
        '</div>'
    );
    $('#logsModal').modal('show');

    var params = { category: category };
    if (section) { params.section = section; }

    $.ajax({
        url: '{{ route("administration.logs") }}',
        method: 'GET',
        data: params,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {
            $('#logsModalContent').html(response.html);
        },
        error: function(xhr) {
            if (xhr.status === 403) {
                $('#logsModalContent').html(
                    '<div class="alert alert-danger m-3">You do not have permission to view logs.</div>'
                );
            } else {
                $('#logsModalContent').html(
                    '<div class="alert alert-warning m-3">Failed to load logs. Please try again.</div>'
                );
            }
        }
    });
}
</script>
