<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JopApplication extends Model {
    use HasFactory;

    protected $timestamps = false;

    public $fillable = [
        'user_id',
        'vacancy_id',
        'status',
        'date',
    ];

    protected $casts = [
        'user_id' => 'string'
    ];
}
