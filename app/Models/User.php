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
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $fillable = [
      'name', 'email', 'password', 'birth_place', 'birth_date', 'sex', 'dept', 'job_title', 'status', 'join_date',
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
     * Menghitung kuota cuti berdasarkan masa kerja.
     *
     * @return int
     */
    public function getLeaveQuota(): int
    {
        $joinDate = Carbon::createFromFormat('Y-m-d', $this->join_date);
        $monthsWorked = $joinDate->diffInMonths(Carbon::now());

        if ($monthsWorked <= 6) {
            return 0;
        } elseif ($monthsWorked <= 11) {
            return 6;
        } else {
            return 12;
        }
    }

    /**
     * Menghitung sisa cuti (leave balance) setelah dikurangi cuti yang sudah diambil.
     *
     * @return int
     */
    public function getLeaveBalance(): int
    {
        $leaveQuota = $this->getLeaveQuota();
        $usedLeave = $this->getTotalUsedLeave();

        return $leaveQuota - $usedLeave;
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
