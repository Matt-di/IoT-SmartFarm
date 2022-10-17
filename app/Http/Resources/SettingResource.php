<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
      'control_mode' => $this->control_mode,
      'moisture_threshold' => $this->moisture_threshold,
      'temperature_threshold' => $this->temperature_threshold,
      'humidity_threshold' => $this->humidity_threshold,
      'motor_status' => $this->motor_status,
    ];
  }
}
