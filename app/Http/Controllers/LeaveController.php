<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Hitung jumlah hari cuti yang diajukan
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $days_requested = $start_date->diffInDays($end_date) + 1;

        // Periksa apakah saldo cuti mencukupi
        $leave_balance = Auth::user()->getLeaveBalance();

        if ($days_requested > $leave_balance) {
            return back()->withErrors(['msg' => 'Saldo cuti tidak mencukupi untuk pengajuan ini']);
        }

        // Simpan pengajuan cuti
        LeaveRequest::create([
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days_requested' => $days_requested,
        ]);

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil diajukan.');
    }
}
