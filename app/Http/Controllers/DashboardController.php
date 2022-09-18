<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService;
    }

    public function dashboard()
    {
        $category = $this->dashboardService->getTotalCategory();

        $material = $this->dashboardService->getTotalMaterial();

        return view('dashboard.dashboard', compact('category', 'material'));
    }
}
