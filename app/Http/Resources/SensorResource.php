<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SensorResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'device_id' => $this->device_id,
      'moisture' => $this->moisture,
      'temperature' => $this->temperature,
      'humidity' => $this->humidity,
      'water_level' => $this->water_level,
      'motor_status' => $this->motor_status,
      'created_at' => $this->created_at,
    ];
  }
}
