<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Status;
use App\Models\Classes;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
