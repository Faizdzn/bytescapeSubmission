<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'course_name',
        'course_desc',
        'course_topic',
        'course_slot',
        'course_author',
        'course_time'
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'course_id';
}
