<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {                                   //ovo ti je guard kao parametar
        $this->middleware('auth:visitor');
    }

    /**
     * Show the visitors dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitor.dashboard');
    }
}
