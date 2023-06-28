<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venues extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "venues";
    protected $fillable = ['name', 'category_id', 'patner_id', 'location_id', 'phone', 'description', 'image', 'status'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function patner()
    {
        return $this->belongsTo(Patner::class);
    }
}
