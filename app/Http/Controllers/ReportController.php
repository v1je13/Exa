<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->string("sort")->toString();
        if (!in_array($sort, ["asc", "desc"], true)) {
            $sort = "desc";
        }

        $validated = $request->validate([
            "status" => ["nullable", "integer", "exists:statuses,id"],
        ]);

        $status = $validated["status"] ?? null;

        $reports = Report::query()
            ->with("status")
            ->where("user_id", Auth::id())
            ->when($status, fn($q) => $q->where("status_id", $status))
            ->orderBy("created_at", $sort)
            ->paginate($status ? 4 : 6);

        $statuses = Status::query()
            ->select(["id", "name"])
            ->get();
        return view(
            "report.index",
            compact("reports", "statuses", "sort", "status"),
        );
    }

    public function destroy(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            $report->delete();
            return redirect()
                ->back()
                ->with("success", __("Заявление удалено."));
        } else {
            abort(403, __("У вас нет прав на удаление записи!"));
        }
    }

    public function store(Request $request, Report $report)
    {
        $data = $request->validate([
            "number" => "string",
            "description" => "string",
        ]);
        $data["user_id"] = Auth::user()->id;
        $data["status_id"] = 1;

        $report->create($data);
       return redirect()->route('reports.index')->with("success", "Заявление отправлено.");
    }

    public function edit(Report $report)
    {
        if (Auth::user()->id === $report->user_id) {
            return view("report.edit", compact("report"));
        } else {
            abort(403, "У вас нет прав на редактирование данной записи!");
        }
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            "number" => "string",
            "description" => "string",
        ]);
        if (Auth::user()->id === $report->user_id) {
            $report->update($data);
            return redirect()
                ->route("reports.index")
                ->with("success", "Заявление обновлено.");
        } else {
            abort(403, __("У вас нет прав!"));
        }
    }

    public function statusUpdate(Request $request, Report $report)
    {
        $request->validate([
            "status_id" => "required|exists:statuses,id",
        ]);
        $report->update($request->only(["status_id"]));
        return redirect()->back();
    }
}
