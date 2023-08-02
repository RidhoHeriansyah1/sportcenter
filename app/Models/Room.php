<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = "rooms";
    protected $fillable = ['room_number', 'price', 'service_id', 'venue_id', 'partner_id', 'time_start', 'time_end'];
    
    public function venue()
    {
        return $this->belongsTo(Venues::class);
    }
}
