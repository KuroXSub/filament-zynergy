<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZynergyController extends Controller
{
    public function index()
    {
        $images = glob(public_path('images/zynergy/*.*')); // Sesuaikan path jika berbeda

        return view('zynergy.index', compact('images'));
    }
}
