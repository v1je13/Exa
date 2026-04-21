<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $reports = Report::query()->with(['user', 'status'])->get();
    $statuses = Status::query()->select(['id', 'name'])->get();

    // Передаем переменные в представление 'admin.index'
    return view('admin.index', compact('reports', 'statuses'));
}
}
