<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan daftar user dengan saldo cuti mereka dan leave requests.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Hitung saldo cuti user
        $leaveBalance = $user->getLeaveBalance();

        // Ambil leave requests milik user yang sedang login
        $leaveRequests = $user->leaveRequests()->get();

        // Kembalikan view dengan data saldo cuti dan leave requests
        return view('dashboard', [
            'user' => $user,
            'leaveBalance' => $leaveBalance,
            'leaveRequests' => $leaveRequests,
        ]);
    }
}
