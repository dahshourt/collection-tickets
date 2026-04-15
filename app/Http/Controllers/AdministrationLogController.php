<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrationLog;
use App\Models\User;
use Auth;
use DB;

class AdministrationLogController extends Controller
{
    /**
     * Return logs as a JSON HTML table.
     * Called via AJAX when clicking a Logs button.
     */
    public function get_logs(Request $request)
    {
        // Only Admin (role 1) may view logs
        if (Auth::user()->role != 1) {
            return response()->json([
                'html' => '<div class="alert alert-danger">Unauthorized Access</div>'
            ], 403);
        }

        try {

            // ── Build query ───────────────────────────────────────────────
            $query = AdministrationLog::query()->with('user');

            if ($request->filled('category')) {
                $query->where('category', $request->input('category'));
            }
            // Only filter by section if the column exists in the table
            if ($request->filled('section') && $this->columnExists('administration_logs', 'section')) {
                $query->where('section', $request->input('section'));
            }
            if ($request->filled('action')) {
                $query->where('action', $request->input('action'));
            }

            $limit = (int) $request->input('limit', 100);
            $logs  = $query->latest()->limit($limit)->get();

            // ── Pre-load lookup maps (safe — wrapped in try/catch) ────────
            $statusMap  = $this->safeMap('statuses',          'id', 'name');
            $groupMap   = $this->safeMap('groups',            'id', 'name');
            $txTypeMap  = $this->safeMap('transaction_types', 'id', 'name');
            $bankMap    = $this->safeMap('receiver_banks',    'id', 'name');
            $segmentMap = $this->safeMap('market_segments',   'id', 'name');
            $userMap    = $this->safeMap('users',             'id', 'user_name');

            // ── Badge colour map ──────────────────────────────────────────
            $badgeColours = array(
                'Create' => 'success',
                'Update' => 'warning',
                'Delete' => 'danger',
                'Search' => 'info',
                'Export' => 'primary',
                'View'   => 'secondary',
                'Login'  => 'dark',
                'Logout' => 'dark',
            );

            // ── Build HTML ────────────────────────────────────────────────
            $html  = '<div class="table-responsive">';
            $html .= '<table class="table table-striped table-bordered table-sm" style="font-size:13px">';
            $html .= '<thead class="thead-dark"><tr>';
            $html .= '<th>#</th>';
            $html .= '<th style="white-space:nowrap">Date &amp; Time</th>';
            $html .= '<th style="white-space:nowrap">User</th>';
            $html .= '<th style="white-space:nowrap">Category</th>';
            $html .= '<th style="white-space:nowrap">Section</th>';
            $html .= '<th style="white-space:nowrap">Action</th>';
            $html .= '<th>Details</th>';
            $html .= '<th style="white-space:nowrap">IP Address</th>';
            $html .= '</tr></thead><tbody>';

            foreach ($logs as $i => $log) {

                $userName = '-';
                if ($log->user) {
                    $userName = $log->user->user_name;
                } elseif ($log->user_id && isset($userMap[$log->user_id])) {
                    $userName = $userMap[$log->user_id];
                }

                $badge   = isset($badgeColours[$log->action]) ? $badgeColours[$log->action] : 'secondary';
                $date    = $this->safeDate($log->created_at);
                $details = $this->formatDetails($log->details, $statusMap, $groupMap, $txTypeMap, $bankMap, $segmentMap, $userMap);

                $html .= '<tr>';
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td style="white-space:nowrap">' . htmlspecialchars($date) . '</td>';
                $sectionVal  = $this->columnExists('administration_logs', 'section')   ? (string)($log->section   ?? '-') : '-';
                $ipVal       = $this->columnExists('administration_logs', 'ip_address') ? (string)($log->ip_address ?? '-') : '-';

                $html .= '<td>' . htmlspecialchars($userName) . '</td>';
                $html .= '<td>' . htmlspecialchars((string)($log->category ?? '')) . '</td>';
                $html .= '<td>' . htmlspecialchars($sectionVal) . '</td>';
                $html .= '<td><span class="badge badge-' . $badge . '">' . htmlspecialchars((string)($log->action ?? '')) . '</span></td>';
                $html .= '<td style="max-width:420px;word-break:break-word">' . $details . '</td>';
                $html .= '<td style="white-space:nowrap">' . htmlspecialchars($ipVal) . '</td>';
                $html .= '</tr>';
            }

            if ($logs->isEmpty()) {
                $html .= '<tr><td colspan="8" class="text-center text-muted py-3">No logs found for this section.</td></tr>';
            }

            $html .= '</tbody></table></div>';

            return response()->json(array('html' => $html));

        } catch (\Exception $e) {
            // Return the actual error so we can debug it
            return response()->json(array(
                'html' => '<div class="alert alert-danger m-3">'
                        . '<strong>Error loading logs:</strong> '
                        . htmlspecialchars($e->getMessage())
                        . '</div>'
            ), 500);
        }
    }

    // ──────────────────────────────────────────────────────────────────────
    // HELPERS
    // ──────────────────────────────────────────────────────────────────────

    /**
     * Check whether a column exists in a table.
     * Uses a static cache so it only hits the DB once per column per request.
     */
    private function columnExists($table, $column)
    {
        static $cache = array();
        $key = $table . '.' . $column;
        if (!isset($cache[$key])) {
            try {
                $cache[$key] = \Schema::hasColumn($table, $column);
            } catch (\Exception $e) {
                $cache[$key] = false;
            }
        }
        return $cache[$key];
    }

    /**
     * Safely load an id=>name map from a table using raw DB query.
     * Returns empty array if the table doesn't exist or query fails.
     */
    private function safeMap($table, $keyCol, $valueCol)
    {
        try {
            $rows = DB::table($table)->select($keyCol, $valueCol)->get();
            $map  = array();
            foreach ($rows as $row) {
                $map[$row->$keyCol] = $row->$valueCol;
            }
            return $map;
        } catch (\Exception $e) {
            return array();
        }
    }

    /**
     * Safely format a date value to "Y-m-d H:i:s".
     * Works with Carbon objects, strings, and null.
     */
private function safeDate($date)
{
    if (empty($date)) return '-';

    try {
        return \Carbon\Carbon::parse($date, 'Africa/Cairo')
            ->format('d-m-Y H:i:s');
    } catch (\Exception $e) {
        return (string)$date;
    }
}

    /**
     * Format the details field into clean HTML lines.
     *
     * Handles 3 formats:
     *  1. Modern pipe-separated:  "Status: Pending | Group: Collections"
     *  2. Old raw JSON blob:      "Report Search: {\"status\":\"9\",...}"
     *  3. Plain text
     */
    private function formatDetails($raw, $statusMap, $groupMap, $txTypeMap, $bankMap, $segmentMap, $userMap)
    {
        $raw = trim((string)($raw ?? ''));
        if ($raw === '') return '-';

        // ── Format 1: pipe-separated (modern logs) ───────────────────────
        if (strpos($raw, ' | ') !== false) {
            $parts = explode(' | ', $raw);
            $lines = array();
            foreach ($parts as $part) {
                $part = trim($part);
                if ($part === '') continue;

                // Resolve any raw status IDs still lurking e.g. "Status: 9"
                $part = $this->resolveInlineStatus($part, $statusMap);
                $part = $this->resolveInlineGroup($part, $groupMap);

                $lines[] = htmlspecialchars($part);
            }
            return implode('<br>', $lines);
        }

        // ── Format 2: contains a JSON blob (legacy logs) ─────────────────
        if (preg_match('/\{.*\}/s', $raw, $jsonMatch)) {
            $decoded = json_decode($jsonMatch[0], true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $prefix = trim(str_replace($jsonMatch[0], '', $raw));
                $prefix = rtrim($prefix, ': ');

                $lines = array();
                foreach ($decoded as $key => $val) {
                    if ($val === null || $val === '') continue;

                    $label   = $this->labelFromKey($key);
                    $display = $this->resolveValue($key, $val, $statusMap, $groupMap, $txTypeMap, $bankMap, $segmentMap, $userMap);

                    $lines[] = '<strong>' . htmlspecialchars($label) . ':</strong> ' . htmlspecialchars((string)$display);
                }

                if (empty($lines)) {
                    return $prefix ? htmlspecialchars($prefix) : 'No filters applied';
                }

                $out = '';
                if ($prefix) {
                    $out = '<strong>' . htmlspecialchars($prefix) . '</strong><br>';
                }
                return $out . implode('<br>', $lines);
            }
        }

        // ── Format 3: plain string ────────────────────────────────────────
        return htmlspecialchars($raw);
    }

    /**
     * Resolve a key=>value to a human-readable name using preloaded maps.
     */
    private function resolveValue($key, $value, $statusMap, $groupMap, $txTypeMap, $bankMap, $segmentMap, $userMap)
    {
        $k = strtolower((string)$key);

        if (in_array($k, array('status', 'status_id'))) {
            return isset($statusMap[$value]) ? $statusMap[$value] . ' (ID: ' . $value . ')' : $value;
        }
        if (in_array($k, array('group_id', 'from_group_id', 'to_group_id', 'creator_group_id', 'previous_group_id'))) {
            return isset($groupMap[$value]) ? $groupMap[$value] . ' (ID: ' . $value . ')' : $value;
        }
        if ($k === 'transaction_type_id') {
            return isset($txTypeMap[$value]) ? $txTypeMap[$value] . ' (ID: ' . $value . ')' : $value;
        }
        if (in_array($k, array('receiver_bank_id', 'bank_id'))) {
            return isset($bankMap[$value]) ? $bankMap[$value] . ' (ID: ' . $value . ')' : $value;
        }
        if ($k === 'market_segment_id') {
            return isset($segmentMap[$value]) ? $segmentMap[$value] . ' (ID: ' . $value . ')' : $value;
        }
        if (in_array($k, array('creator_id', 'creator_name_id', 'user_id'))) {
            return isset($userMap[$value]) ? $userMap[$value] . ' (ID: ' . $value . ')' : $value;
        }

        return (string)$value;
    }

    /**
     * Replace raw "Status: 9" or "Status: 9 → 12" in a text line with names.
     */
    private function resolveInlineStatus($line, $statusMap)
    {
        if (empty($statusMap)) return $line;

        return preg_replace_callback(
            '/\bStatus:\s*(\d+)(\s*(?:→|-+>)\s*(\d+))?/u',
            function ($m) use ($statusMap) {
                $from = isset($statusMap[$m[1]]) ? $statusMap[$m[1]] : $m[1];
                if (!empty($m[3])) {
                    $to = isset($statusMap[$m[3]]) ? $statusMap[$m[3]] : $m[3];
                    return 'Status: ' . $from . ' → ' . $to;
                }
                return 'Status: ' . $from;
            },
            $line
        );
    }

    /**
     * Replace raw "Group: 3" or "Group Id: 3" in a text line with names.
     */
    private function resolveInlineGroup($line, $groupMap)
    {
        if (empty($groupMap)) return $line;

        return preg_replace_callback(
            '/\bGroup(?:\s+Id)?:\s*(\d+)(\s*(?:→|-+>)\s*(\d+))?/u',
            function ($m) use ($groupMap) {
                $from = isset($groupMap[$m[1]]) ? $groupMap[$m[1]] : $m[1];
                if (!empty($m[3])) {
                    $to = isset($groupMap[$m[3]]) ? $groupMap[$m[3]] : $m[3];
                    return 'Group: ' . $from . ' → ' . $to;
                }
                return 'Group: ' . $from;
            },
            $line
        );
    }

    /**
     * Convert a snake_case key into a readable Title Case label.
     */
    private function labelFromKey($key)
    {
        $key = preg_replace('/_id$/', '', $key);
        $key = preg_replace('/_at$/', ' Date', $key);
        $key = str_replace('_', ' ', $key);
        return ucwords($key);
    }

    /**
     * Delete workflow logs
     * Only Admin (role 1) may delete logs
     */
    public function delete_workflow_logs(Request $request)
    {
        // Only Admin (role 1) may delete logs
        if (Auth::user()->role != 1) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized Access'
            ], 403);
        }

        try {
            $deletedCount = AdministrationLog::where('category', 'Workflow')->delete();
            
            // Log the deletion action
            \App\Models\AdministrationLog::create([
                'user_id' => Auth::id(),
                'category' => 'Workflow',
                'action' => 'Delete',
                'details' => "Deleted {$deletedCount} workflow logs"
            ]);

            return response()->json([
                'success' => true,
                'message' => "Successfully deleted {$deletedCount} workflow logs",
                'deleted_count' => $deletedCount
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting workflow logs: ' . $e->getMessage()
            ], 500);
        }
    }
}
