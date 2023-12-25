<?php

namespace App\Http\Controllers;

use App\Models\ResumeRow;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $resumeRows = ResumeRow::query()
            ->with('company')
            ->get();
        return Inertia::render(
            'Home',
            compact(
                'resumeRows'
            )
        );
    }
}
