<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use Illuminate\View\View;

class SantriController extends Controller
{
    public function index(): View
    {
        return view('santri.santri-index');
    }
}
