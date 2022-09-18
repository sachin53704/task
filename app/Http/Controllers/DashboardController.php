<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct()
    {
        // to call dashboard service class
        $this->dashboardService = new DashboardService;
    }

    public function dashboard()
    {
        // to get the total active category
        $category = $this->dashboardService->getTotalCategory();

        // to get the total active material
        $material = $this->dashboardService->getTotalMaterial();

        return view('dashboard.dashboard', compact('category', 'material'));
    }
}
