<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LockHistory extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'action', 'reason', 'performed_by'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
