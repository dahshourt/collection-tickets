<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    // No asDateTime() override — Laravel's default behaviour converts
    // UTC timestamps from the DB into the app timezone (Africa/Cairo)
    // correctly via Carbon. Any custom override here was blocking that
    // conversion and causing displayed times to be wrong.
}
