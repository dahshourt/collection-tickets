<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BaseModel extends Model
{
    protected function asDateTime($value)
    {
        // Timestamps are stored in Cairo local time (PHP timezone is set to
        // Africa/Cairo in AppServiceProvider via date_default_timezone_set).
        // We tell Carbon the value is already in Cairo — no conversion needed.
        return Carbon::parse($value, 'Africa/Cairo');
    }
}
