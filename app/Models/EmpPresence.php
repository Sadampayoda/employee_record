<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EmpPresence extends Model
{
    protected $guarded = ['id'];

    public function employee()
    {
        return $this->hasMany(Employee::class,'employee_id');
    }
    public static function late_in($check_in)
    {
        $work_start = Carbon::parse('08:00:00')->format('H:i');
        $check_in_time = Carbon::parse($check_in)->format('H:i');
        $difference = Carbon::parse($check_in_time)->diffInMinutes(Carbon::parse($work_start));

        return Carbon::parse($check_in_time)->greaterThan(Carbon::parse($work_start)) ? $difference * -60 : $difference * 60;
    }

    public static function early_out($check_out)
    {
        $work_end = Carbon::parse('17:00:00')->format('H:i');
        $check_out_time = Carbon::parse($check_out)->format('H:i');
        $difference = Carbon::parse($check_out_time)->diffInMinutes(Carbon::parse($work_end));

        return Carbon::parse($check_out_time)->lessThan(Carbon::parse($work_end)) ? $difference * -60 : 0;
    }
}
