<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    // Получаем все заявки и все статусы из базы данных
    $reports = Report::all();
    $statuses = Status::all();

    // Передаем переменные в представление 'admin.index'
    return view('admin.index', compact('reports', 'statuses'));
}
}
