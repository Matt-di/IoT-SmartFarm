<?php

namespace App\Models;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'device_id',
    'moisture',
    'temperature',
    'humidity',
    'water_level',
    'motor_status'
  ];

  public function device()
  {
    return $this->belongsTo(Device::class);
  }

  public $incrementing = false;
}
