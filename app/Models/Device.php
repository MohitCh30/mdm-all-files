<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'user_name', 'location', 'status'];

    public function lockHistories()
    {
        return $this->hasMany(LockHistory::class);
    }
}
