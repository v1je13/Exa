<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
       $sort = $request->input('sort');
       if ($sort == 'asc' || $sort=='desc')
       {
        $reports = Report::orderBy('created_at', $sort)->paginate(4);
       }
       else
       {
        $reports = Report::paginate(6);
       }
       $statuses = Status::all();
       return view('report.index', compact('reports', 'statuses'));
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->back();
    }

    public function store(Request $request, Report $report)
    {
        $data = $request -> validate(
            [
                'number' => 'string',
                'description' => 'string',
            ]
            );
            $report->create($data);
             return redirect()->route('reports.index');
    }

    public function edit(Report $report)
    {
       
        return view('report.edit', compact('report')) ;

       
    }

     public function update(Request $request, Report $report)
    {
        $data = $request -> validate(
            [
                'number' => 'string',
                'description' => 'string',
            ]
            );
            $report->update($data);
            return redirect()->route('reports.index');
    }

}
