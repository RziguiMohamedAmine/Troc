<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function showBackofficeReports()
    {
        $listReports = Reports::all();    
        return view('backoffice.reports.index', compact('listReports'));
    }

    public function approve(Request $request)
    {

        //read from input the report id
        $report_id =  $request->report_id;
        $report = Reports::find($report_id);
        //change the body of message to "This message has been deleted by admin"
        $report->message->body = "This message has been deleted by admin";
        $report->message->save();
        //add warning to the user
        $report->message->user->warnings += 1;
        $report->message->user->save();
        //delete the report
        $report->delete();
        return redirect()->route('backoffice.reports.index');

    }

    public function deny(Request $request)
    {
        //read from input the report id
        $report_id =  $request->report_id;
        $report = Reports::find($report_id);
        //delete the report
        $report->delete();
        return redirect()->route('backoffice.reports.index');
    }

}
