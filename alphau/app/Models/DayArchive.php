<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'archive_date',
        'program_name',
        'episode',
        'is_visible',
        'program_directory',
        'archive_id'

    ];
    public function program_archives()
    {
        return $this->belongsTo(ProgramArchive::class);
    }
    public function day_archive_audio_files()
    {
        return $this->hasMany(DayArchiveAudioFile::class);
    }
}
