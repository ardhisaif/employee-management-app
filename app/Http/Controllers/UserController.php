<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Method untuk menampilkan form user information
    public function createUserInfo()
    {
        return view('user-info-form');
    }

    // Method untuk menyimpan data user information
    public function storeUserInfo(Request $request)
    {
      $request->validate([
          'birth_place' => 'required|string|max:255',
          'birth_date' => 'required|date',
          'dept' => 'required|string|max:255',
          'job_title' => 'required|string|max:255',
          'status' => 'required|string|max:255',
          'join_date' => 'required|date',
      ]);

      $user = Auth::user();
      $user->update([
          'birth_place' => $request->input('birth_place'),
          'birth_date' => $request->input('birth_date'),
          'dept' => $request->input('dept'),
          'job_title' => $request->input('job_title'),
          'status' => $request->input('status'),
          'join_date' => $request->input('join_date'),
      ]);

      // Setelah berhasil simpan, redirect ke dashboard
      return redirect()->route('dashboard')->with('success', 'User information saved successfully.');
    }
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

        // Ambil kuota cuti user
        $leaveQuota = $user->getLeaveQuota();

        // Kembalikan view dengan data saldo cuti dan leave requests
        return view('dashboard', [
            'user' => $user,
            'leaveQuota' => $leaveQuota,
            'leaveBalance' => $leaveBalance,
            'leaveRequests' => $leaveRequests,
        ]);
    }
}
