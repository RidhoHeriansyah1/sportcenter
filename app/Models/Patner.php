<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patner extends Model
{
    use HasFactory;
    protected $table = "owners";
    protected $fillable = ['fullname', 'username','email','password','phone','address', 'status','remember_token'];
}
