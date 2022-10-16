<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'device_id',
    'control_mode',
    'moisture_threshold',
    'temperature_threshold',
    'humidity_threshold',
  ];

  public function device()
  {
    return $this->belongsTo(Device::class);
  }

  public $incrementing = false;
}
