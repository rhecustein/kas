<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\SchoolMajor;
use App\Models\User;
use App\Services\ChartGenerator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(
        private ChartGenerator $chartGenerator
    ) {
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(): View
    {
        $charts = $this->chartGenerator->generateCharts();

        if(Auth::user()->role->name != 'admin'){
            return view('dashboard_msh');
        }
        return view('dashboard', compact('charts'));
    }
}
