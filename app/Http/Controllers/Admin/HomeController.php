<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $flats_count = Flat::all()->count();

        return view('admin.home.index', [
            'flats_count' => $flats_count
        ]);
    }
}
