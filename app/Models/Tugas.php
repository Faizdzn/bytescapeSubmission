<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    /** @use HasFactory<\Database\Factories\TugasFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tugas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'tugas_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'tugas_name',
        'tugas_desc',
        'kelas_id',
        'end_time'
    ];
}
