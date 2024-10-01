<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;

    // Tentukan tabel yang terkait, jika nama tabel tidak mengikuti konvensi Laravel
    protected $table = 'leave_requests';

    // Tentukan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'days_requested',
    ];
}
