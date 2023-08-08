<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Patient extends Model
{
    use HasFactory;

    /*
    'name' => 'required|string|max:255',

            'house' => 'required|string|max:255',

            'user_id' => 'required|exists:users,id',
    */

    protected $fillable = [
        'patient_name',
        'house',
        'user_id',
    ];




 public function user()
 {
    return $this->belongsTo(User::class);
  }

  public function dailyEntries()
    {
        return $this->hasMany(DailyEntry::class);
    }
}
