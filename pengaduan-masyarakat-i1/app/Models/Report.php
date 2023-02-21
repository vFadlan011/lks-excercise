<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'nik',
        'email',
        'phone',
        'report_msg',
        'report_img_1',
        'report_img_2',
        'report_img_3',
        'report_img_4',
        'report_img_5',
        'report_timestamp',
        'status',
        'response_msg',
        'response_img_1',
        'response_img_2',
        'response_img_3',
        'response_img_4',
        'response_img_5',
        'response_timestamp',
        'respondent_id'
    ];
}
