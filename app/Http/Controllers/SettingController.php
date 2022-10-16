<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Device $device, Request $request)
  {
    $setting = $device->setting()->get()->first();
    return view('setting.index', ['setting' => $setting]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Device $device)
  {
    return view('setting.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Device $device, Request $request)
  {
    $this->validate($request, [
      'control_mode' => "required",
      'moisture_threshold' => "required",
      'temperature_threshold' => "required",
      'humidity_threshold' => "required",
    ]);

    $setting = $device->setting()->create([
      'control_mode' => $request->control_mode,
      'moisture_threshold' => $request->moisture_threshold,
      'temperature_threshold' => $request->temperature_threshold,
      'humidity_threshold' => $request->humidity_threshold,
    ]);
    return redirect()->route('settings.index', ['user' => auth()->user()->id, 'device' => $device->id]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function show(Device $device, Setting $setting)
  {
    return view('setting.show', ['setting' => $setting]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function edit(Device $device, Setting $setting)
  {
    return view('setting.edit', ["setting" => $setting]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function update(Device $device, Request $request, Setting $setting)
  {
    $setting->update($request->only('control_mode', 'moisture_threshold', 'temperature_threshold', 'humidity_threshold'));
    return redirect()->route('settings.index', ['user' => auth()->user()->id, 'device' => $device->id,'']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Setting  $setting
   * @return \Illuminate\Http\Response
   */
  public function destroy(Device $device, Setting $setting)
  {
    //
  }
}
