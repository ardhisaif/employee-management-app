<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user dengan saldo cuti mereka.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua user dari database
        $users = User::all();

        // Hitung saldo cuti untuk masing-masing user
        $leaveBalances = $users->map(function ($user) {
            return [
                'name' => $user->name,
                'leave_balance' => $user->getLeaveBalance(),
            ];
        });

        // Kembalikan view dengan data saldo cuti
        return view('dashboard', ['leaveBalances' => $leaveBalances]);
    }
}
