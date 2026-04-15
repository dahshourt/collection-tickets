<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BaseModel extends Model
{
    protected function asDateTime($value)
    {
        // Treat DB value as Cairo time WITHOUT converting
        return Carbon::parse($value, 'Africa/Cairo');
    }
}