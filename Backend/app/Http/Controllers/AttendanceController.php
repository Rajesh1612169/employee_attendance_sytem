<?php

namespace App\Http\Controllers;

use App\Services\AppHumanResources\Attendance\Application\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index() {
       $attendance =  $this->attendanceService->getAttendance();
       return $attendance;
    }

    public function store(Request $request) {

        $status =  $this->attendanceService->createAttendance($request);

        return $status;
    }
}
