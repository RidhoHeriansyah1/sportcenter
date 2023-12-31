<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = "services";
    protected $fillable = ['name', 'venue_id', 'image', 'description'];

    public function venue()
    {
        return $this->belongsTo(Venues::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function amenities(){
        return $this->belongsToMany(Amenity::class, 'service_amenities', 'service_id', 'amenity_id')->withTimestamps();
    }
}
