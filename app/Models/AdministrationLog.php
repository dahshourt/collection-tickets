<?php

namespace App\Models;

use App\Models\BaseModel;

class AdministrationLog extends BaseModel
{
    protected $fillable = [
        'user_id',
        'category',
        'section',
        'action',
        'details',
        'ip_address',
        'user_agent',
    ];

    const CATEGORIES = ['User', 'Group', 'Workflow', 'Report'];
    const ACTIONS    = ['Create', 'Update', 'Delete', 'Search', 'Export', 'View', 'Login', 'Logout'];

    /**
     * Belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return details formatted as clean HTML lines.
     *
     * Handles 3 formats automatically:
     *  1. Modern pipe-separated:  "Status: Pending | Group: Collections"  → one line per segment
     *  2. Old raw JSON:           '{"status":"9","created_at":null,...}'  → decoded, nulls removed
     *  3. Plain text:             "Created user john.doe (ID: 5)"         → returned as-is
     */
    public function getFormattedDetailsAttribute()
    {
        $raw = trim($this->details ?? '');

        if ($raw === '' || $raw === null) {
            return '-';
        }

        // ── Format 1: pipe-separated modern logs ─────────────────────────
        if (strpos($raw, ' | ') !== false) {
            $parts = explode(' | ', $raw);
            $lines = array();
            foreach ($parts as $part) {
                $part = trim($part);
                if ($part !== '') {
                    $lines[] = htmlspecialchars($part);
                }
            }
            return implode('<br>', $lines);
        }

        // ── Format 2: contains a JSON blob (legacy logs) ──────────────────
        if (preg_match('/\{.*\}/s', $raw, $jsonMatch)) {
            $decoded = json_decode($jsonMatch[0], true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                // Get any prefix text before the JSON
                $prefix = trim(str_replace($jsonMatch[0], '', $raw));
                $prefix = rtrim($prefix, ': ');

                $lines = array();
                foreach ($decoded as $key => $value) {
                    if ($value === null || $value === '') {
                        continue;
                    }
                    $label   = $this->cleanLabel($key);
                    $lines[] = '<strong>' . htmlspecialchars($label) . ':</strong> ' . htmlspecialchars((string)$value);
                }

                if (empty($lines)) {
                    return $prefix ? htmlspecialchars($prefix) : 'No filters applied';
                }

                $output = '';
                if ($prefix) {
                    $output = '<strong>' . htmlspecialchars($prefix) . '</strong><br>';
                }
                $output .= implode('<br>', $lines);
                return $output;
            }
        }

        // ── Format 3: plain string ────────────────────────────────────────
        return htmlspecialchars($raw);
    }

    /**
     * Convert snake_case key to readable Title Case.
     */
    private function cleanLabel($key)
    {
        $key = preg_replace('/_id$/', '', $key);
        $key = preg_replace('/_at$/', ' Date', $key);
        $key = str_replace('_', ' ', $key);
        return ucwords($key);
    }
}
