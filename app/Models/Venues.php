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
        return $this->belongsTo(Category::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
