<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model {
  use HasFactory, Notifiable;

  public $timestamps = false;

  protected $fillable = [
    'title',
    'company_id',
    'category_id',
    'regional',
    'salary',
    'description',
    'due_to',
    'created_at',
  ];

  protected $casts = [
    'id' => 'string'
  ];
}
