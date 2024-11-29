<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpSalary extends Model
{
    protected $guarded = ['id'];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public static function calculateBonus($basicSalary, $lateMinutes = 0, $earlyMinutes = 0)
    {
        $bonus = 0;

        if ($lateMinutes > 5) {
            $bonus -= ($lateMinutes - 5) * 5000; // Denda keterlambatan
        }

        if ($earlyMinutes > 0) {
            $bonus -= $earlyMinutes * 5000; // Denda pulang cepat
        }

        return $bonus;
    }

    public static function calculateBPJS($basicSalary)
    {
        return $basicSalary * 0.02; // 2% dari basic salary
    }

    public static function calculateJP($basicSalary)
    {
        return $basicSalary * 0.01; // 1% dari basic salary
    }

    public static function calculateTotalSalary($basicSalary, $bonus, $bpjs, $jp, $loan)
    {
        return ($basicSalary + $bonus) - ($bpjs + $jp + $loan); // Perhitungan total salary
    }

    public static function setSalaryAttributes($basicSalary, $lateMinutes = 0, $earlyMinutes = 0, $loan = 0)
    {
        $bonus = self::calculateBonus($basicSalary, $lateMinutes, $earlyMinutes);
        $bpjs = self::calculateBPJS($basicSalary);
        $jp = self::calculateJP($basicSalary);
        $totalSalary = self::calculateTotalSalary($basicSalary, $bonus, $bpjs, $jp, $loan);

        $this->attributes['bonus'] = $bonus;
        $this->attributes['bpjs'] = $bpjs;
        $this->attributes['jp'] = $jp;
        $this->attributes['total_salary'] = $totalSalary;
    }
}
