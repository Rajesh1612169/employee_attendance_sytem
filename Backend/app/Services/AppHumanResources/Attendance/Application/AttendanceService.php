<?php
namespace App\Services\AppHumanResources\Attendance\Application;

use App\Services\AppHumanResources\Attendance\Domain\Attendance;

class AttendanceService
{
    public function createAttendance($data)
    {

        $dataArray = $data->all();

        for ($i = 0; $i < count($dataArray); $i++) {
                    $attendance = new Attendance([
                'emp_id' => $dataArray[$i][0],
                'time_in' => $dataArray[$i][1],
                'time_out' => $dataArray[$i][2],
                'status' => $dataArray[$i][3],
            ]);

            $status = $attendance->save();

        }

        return 1;
    }


    public function getAttendance()
    {
        $attendance = Attendance::all();
//        dd($attendance);.
        return response()->json($attendance);
    }

}
