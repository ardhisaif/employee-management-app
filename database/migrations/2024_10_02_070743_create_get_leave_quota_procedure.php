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
                IN p_join_date DATE
            )
            BEGIN
                DECLARE v_months_worked INT;
                DECLARE v_leave_quota INT;

                -- Hitung jumlah bulan yang sudah bekerja
                SET v_months_worked = TIMESTAMPDIFF(MONTH, p_join_date, CURDATE());

                -- Tentukan kuota cuti berdasarkan jumlah bulan yang sudah bekerja
                IF v_months_worked <= 6 THEN
                    SET v_leave_quota = 0;
                ELSEIF v_months_worked <= 11 THEN
                    SET v_leave_quota = 6;
                ELSE
                    SET v_leave_quota = 12;
                END IF;

                -- Lakukan SELECT untuk mengembalikan hasil kuota cuti
                SELECT v_leave_quota AS leave_quota;
            END
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
