<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Device $device)
  {
    return view('sensor.index',['sensors'=>$device->sensors()->paginate(10)]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Device $device)
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Device $device, Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Sensor  $sensor
   * @return \Illuminate\Http\Response
   */
  public function show(Device $device, Sensor $sensor)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Sensor  $sensor
   * @return \Illuminate\Http\Response
   */
  public function edit(Device $device, Sensor $sensor)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Sensor  $sensor
   * @return \Illuminate\Http\Response
   */
  public function update(Device $device, Request $request, Sensor $sensor)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Sensor  $sensor
   * @return \Illuminate\Http\Response
   */
  public function destroy(Device $device, Sensor $sensor)
  {
    //
  }
}
