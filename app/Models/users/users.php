<?php

namespace App\Models\users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email','password'];
}
