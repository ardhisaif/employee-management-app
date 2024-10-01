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

        if ($monthsWorked <= 6) {
            return 0;
        } elseif ($monthsWorked <= 11) {
            return 6;
        } else {
            return 12;
        }
    }
}
