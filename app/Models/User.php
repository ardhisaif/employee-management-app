<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Menghitung saldo cuti berdasarkan masa kerja.
     *
     * @return int
     */
    public function getLeaveBalance(): int
    {
        $joinDate = Carbon::createFromFormat('d/m/Y', $this->join_date);
        $monthsWorked = $joinDate->diffInMonths(Carbon::now());

        // Default leave balance based on months worked
        if ($monthsWorked <= 6) {
            $totalLeaveBalance = 0;
        } elseif ($monthsWorked <= 11) {
            $totalLeaveBalance = 6;
        } else {
            $totalLeaveBalance = 12;
        }

        // Kurangi total leave balance dengan cuti yang sudah digunakan
        $usedLeave = $this->getTotalUsedLeave();

        return $totalLeaveBalance - $usedLeave;
    }

    /**
     * Menghitung total hari cuti yang sudah digunakan.
     *
     * @return int
     */
    public function getTotalUsedLeave(): int
    {
        // Hitung total days_requested dari semua leave requests yang disetujui (atau semua jika tidak ada status approval)
        return $this->leaveRequests()->sum('days_requested');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
