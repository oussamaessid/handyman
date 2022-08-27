<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
