<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

  public function index()
  {
    $devices = auth()->user()->devices()->get()->all();
    $devices2 = json_encode($devices);
    return view('home', compact('devices','devices2'));
  }
  //
}
