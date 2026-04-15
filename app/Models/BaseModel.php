<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    // No asDateTime() override needed.
    // MySQL connection timezone is set to +02:00 (Africa/Cairo) in
    // config/database.php, so all timestamps arrive already in Cairo
    // local time and Carbon formats them correctly without any conversion.
}
