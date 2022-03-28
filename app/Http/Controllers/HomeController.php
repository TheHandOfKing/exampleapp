<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function savedCars()
    {
        $savedCars = auth()->user()->savedCars;
        $manufacturers = Manufacturer::all();
        return view('cars.saved', compact('manufacturers', 'savedCars'));
    }
}
