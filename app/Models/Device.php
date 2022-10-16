<?php

namespace App\Models;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Device extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'user_id',
    'name',
    'server_name',
    'moisture',
    'temperature',
    'humidity',
    'water_level',
    'motor_status'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function setting()
  {
    return $this->hasOne(Setting::class);
  }
  public function sensors()
  {
    return $this->hasMany(Sensor::class);
  }

  public $incrementing = false;
}
