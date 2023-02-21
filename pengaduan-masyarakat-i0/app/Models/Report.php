<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = [
        'name',
        'nik',
        'email',
        'phone',
        'report_msg',
        'report_img1',
        'report_img2',
        'report_img3',
        'report_img4',
        'report_img4',
        'report_timestamp',
        'status',
        'response_msg',
        'response_img1',
        'response_img2',
        'response_img3',
        'response_img4',
        'response_img5',
        'response_timestamp',
        'respondent_id',
    ];
}
