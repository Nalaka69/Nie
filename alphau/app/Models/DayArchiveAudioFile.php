<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayArchiveAudioFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'day_program_file',
        'day_program_id'
    ];

    public function programs()
    {
        return $this->belongsTo(DayArchive::class);
    }
}
