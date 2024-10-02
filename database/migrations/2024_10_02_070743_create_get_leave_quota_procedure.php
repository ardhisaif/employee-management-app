<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateGetLeaveQuotaProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE PROCEDURE employee_app.getLeaveQuota(
                IN p_user_id INT
            )
            BEGIN
                DECLARE v_months_worked INT;
                DECLARE v_leave_quota INT;
                DECLARE v_join_date DATE;

                -- Ambil join_date berdasarkan user_id dari tabel users
                SELECT join_date INTO v_join_date
                FROM users
                WHERE id = p_user_id;

                -- Jika join_date ditemukan, hitung jumlah bulan yang sudah bekerja
                IF v_join_date IS NOT NULL THEN
                    SET v_months_worked = TIMESTAMPDIFF(MONTH, v_join_date, CURDATE());

                    -- Tentukan kuota cuti berdasarkan jumlah bulan yang sudah bekerja
                    IF v_months_worked <= 6 THEN
                        SET v_leave_quota = 0;
                    ELSEIF v_months_worked <= 11 THEN
                        SET v_leave_quota = 6;
                    ELSE
                        SET v_leave_quota = 12;
                    END IF;
                ELSE
                    -- Jika join_date tidak ditemukan, set kuota cuti ke NULL
                    SET v_leave_quota = NULL;
                END IF;

                -- Lakukan SELECT untuk mengembalikan hasil kuota cuti
                SELECT v_leave_quota AS leave_quota;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS employee_app.getLeaveQuota');
    }
}
