<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
  protected $fillable = ['name', 'details_plan', 'plan_id'];

  public function plan()
  {
    return $this->belongsTo(Plan::class);
  }
}
