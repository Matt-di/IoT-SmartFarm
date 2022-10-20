<?php

namespace App\Http\Controllers\Api;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DeviceResource;
use App\Http\Resources\SensorResource;
use App\Http\Resources\SettingResource;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
  //

  public function index()
  {
    $devices = Device::with('sensors')->paginate(10);
    $data['devices'] = DeviceResource::collection($devices)->response()->getData(true);
    return response($data);
  }

  public function data(Device $device)
  {
    $sensors = $device->sensors()->orderBy('created_at', 'DESC')->take(10)->get()->reverse();
    $data = [];
    foreach ($sensors as $sensor) {
      $data['moisture'][] = $sensor->moisture;
      $data['temperature'][] = $sensor->temperature;
      $data['humidity'][] = $sensor->humidity;
      $data['date'][] = $sensor->created_at->format('M j, H:i:s');
    }
    // $data['sensors'] = SensorResource::collection($sensors)->response()->getData(true);
    return response($data);
  }

  public function storeSensorData(Request $request, Device $device)
  {
    // if (
    //   $request->moisture == null ||
    //   $request->temperature == null ||
    //   $request->humidity == null ||
    //   $request->water_level == null ||
    //   $request->motor_status == null
    // )
    $validator = Validator::make($request->all(), [
      'moisture' => 'required',
      'temperature' => 'required',
      'humidity' => 'required',
      'water_level' => 'required',
      'motor_status' => 'required',
    ], ['a' => "Please Provide data"]);
    // return $request;
    if ($validator->fails()) {

      return response()->json(['message' => "Please provide required data"]);
    }
    $device->sensors()->create([
      'id' => Str::uuid(),
      'moisture' => $request->moisture,
      'temperature' => $request->temperature,
      'humidity' => $request->humidity,
      'water_level' => $request->water_level,
      'motor_status' => $request->motor_status,
    ]);
    // $device->update([
    //   'motor_status' => $request->motor_status == 0? 'auto':'',
    // ]);
    return response()->json(["message" => "Added"]);
  }

  public function setting(Device $device)
  {
    $setting = $device->setting()->get();
    $data = SettingResource::collection($setting)->response()->getData(true);
    return response($data);
  }

  public function updateSetting(Request $request, Device $device)
  {
    // return $request->all();
    // Setting::update()
    $device->setting()->update(['control_mode' => $request->json('control_mode')]);
    return response($device->setting()->get('control_mode'), 200);
  }
  public function toggleMotor(Request $request, Device $device)
  {

    $device->update(['motor_status' => $request->json('motor_status')]);
    return response()->json($device->motor_status, 200);
  }
  public function toggleMode(Request $request, Device $device)
  {

    $device->setting()->update(['control_mode' => $request->json('control_mode')]);
    return response()->json($device->motor_status, 200);
  }
}
