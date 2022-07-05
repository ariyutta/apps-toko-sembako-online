<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataLaporanController extends Controller
{
    public function laporan() {
        $title_admin = 'Laporan';

        return view('admins.laporan.index', compact('title_admin'));
    }
}
