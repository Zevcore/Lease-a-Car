<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        Session::forget(['model', 'package', 'brand']);
        return view('admin.index');
    }
}
