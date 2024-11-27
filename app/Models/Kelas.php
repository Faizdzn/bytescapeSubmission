<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /** @use HasFactory<\Database\Factories\KelasFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'kelas_name',
        'kelas_desc',
        'created_by'
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'kelas_id';
}
