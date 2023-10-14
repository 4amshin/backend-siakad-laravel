<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //index
    public function index()
    {
        $schedules = Schedule::paginate(10);
        return view('pages.schedules.index', compact('schedules'));
    }

    //function for navigate to generateQrCode Page
    public function generateQrCode(Schedule $schedule)
    {
        return view('pages.schedules.input_qrcode')->with('schedule', $schedule);
    }

    //function for generate QrCode and Update code to schedule
    public function generateQrCodeUpdate(Request $request, Schedule $schedule)
    {
        $request->validate([
            'code' => 'required',
        ]);


        $schedule->update([
            'kode_absensi' => $request->code,
        ]);

        $code = $request->code;

        return view('pages.schedules.show_qrcode', compact('code'))->with('success', 'Code Updated Successfully');
        // $schedule = Schedule::where('id', $request->id)->first();
        // if($schedule) {
        //     $schedule->update([
        //         'code' => $request->code,
        //     ]);
        //     return view('pages.schedules.show_qrcode', compact('schedule'))->with('success', 'Code Updated Successfully');
        // } else {
        //     return redirect()->route('pages.schedules.index')->with('error', 'Code Not Found');

        // }
    }




}
