<?php

namespace App\traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Trait LogsActivity
 * PHP 7.0+ compatible.
 * Uses raw DB::insert() to bypass Eloquent fillable and column issues entirely.
 */
trait LogsActivity
{
    protected function writeLog($category, $details, $action = 'View', $section = null)
    {
        try {
            // Get actual columns that exist in the table right now
            $existingColumns = Schema::getColumnListing('administration_logs');

            // Build only the data for columns that actually exist
            $allData = array(
                'user_id'    => Auth::id(),
                'category'   => (string)$category,
                'action'     => (string)$action,
                'details'    => (string)$details,
                'section'    => $section ? (string)$section : null,
                'ip_address' => Request::ip(),
                'user_agent' => substr((string)Request::userAgent(), 0, 255),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            // Keep only columns that exist in the table
            $data = array();
            foreach ($allData as $col => $val) {
                if (in_array($col, $existingColumns)) {
                    $data[$col] = $val;
                }
            }

            if (!empty($data)) {
                DB::table('administration_logs')->insert($data);
            }

        } catch (\Exception $e) {
            // Last resort — try inserting only the absolute minimum
            try {
                DB::table('administration_logs')->insert(array(
                    'user_id'    => Auth::id(),
                    'category'   => (string)$category,
                    'action'     => (string)$action,
                    'details'    => (string)$details,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ));
            } catch (\Exception $e2) {
                // Write to Laravel log file so we can see what's wrong
                \Log::error('AdministrationLog FAILED: ' . $e2->getMessage());
            }
        }
    }

    protected function formatRequestDetails($inputs, $skip = array('_token', '_method'))
    {
        $parts = array();

        foreach ($inputs as $key => $value) {
            if (in_array($key, $skip)) continue;
            if ($value === null || $value === '' || $value === array()) continue;

            $label        = $this->_formatLabel($key);
            $displayValue = $this->_resolveValue($key, $value);
            $parts[]      = $label . ': ' . $displayValue;
        }

        return !empty($parts) ? implode(' | ', $parts) : 'No filters applied';
    }

    private function _formatLabel($key)
    {
        $key = preg_replace('/_id$/', '', $key);
        $key = preg_replace('/_at$/', ' Date', $key);
        $key = str_replace('_', ' ', $key);
        return ucwords($key);
    }

    private function _resolveValue($key, $value)
    {
        if (is_array($value)) {
            $filtered = array_filter($value, function ($v) {
                return $v !== null && $v !== '';
            });
            return implode(', ', $filtered);
        }

        $k = strtolower($key);

        try {
            if (in_array($k, array('status', 'status_id', 'from_status_id', 'to_status_id'))) {
                $row = DB::table('statuses')->select('name')->where('id', $value)->first();
                if ($row) return $row->name . ' (ID: ' . $value . ')';
            }
            if (in_array($k, array('group_id', 'from_group_id', 'to_group_id', 'creator_group_id', 'previous_group_id'))) {
                $row = DB::table('groups')->select('name')->where('id', $value)->first();
                if ($row) return $row->name . ' (ID: ' . $value . ')';
            }
            if ($k === 'transaction_type_id') {
                $row = DB::table('transaction_types')->select('name')->where('id', $value)->first();
                if ($row) return $row->name . ' (ID: ' . $value . ')';
            }
            if (in_array($k, array('receiver_bank_id', 'bank_id'))) {
                $row = DB::table('receiver_banks')->select('name')->where('id', $value)->first();
                if ($row) return $row->name . ' (ID: ' . $value . ')';
            }
            if ($k === 'market_segment_id') {
                $row = DB::table('market_segments')->select('name')->where('id', $value)->first();
                if ($row) return $row->name . ' (ID: ' . $value . ')';
            }
            if (in_array($k, array('creator_id', 'creator_name_id', 'user_id'))) {
                $row = DB::table('users')->select('user_name')->where('id', $value)->first();
                if ($row) return $row->user_name . ' (ID: ' . $value . ')';
            }
        } catch (\Exception $e) {
            // silent
        }

        return (string)$value;
    }
}
