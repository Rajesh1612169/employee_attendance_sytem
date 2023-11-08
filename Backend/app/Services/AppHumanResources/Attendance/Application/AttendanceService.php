<?php
namespace App\Services\AppHumanResources\Attendance\Application;

use App\Services\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceService
{
    public function createAttendance($data)
    {
        $attendance = new Attendance([
            'emp_id' => $data->emp_id,
            'time_in' => $data->time_in,
            'time_out' => $data->time_out,
            'status' => $data->status,
        ]);

       $status = $attendance->save();
        return $status;
    }


    public function getAttendance()
    {
        $attendance = Attendance::all();
//        dd($attendance);.
        return $attendance;
    }

}
