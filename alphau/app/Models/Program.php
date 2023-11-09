<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'episode',
        'episode_date',
        'is_visible',
        'program_directory',
        'archive_id'

    ];
    public function program_archives()
    {
        return $this->belongsTo(ProgramArchive::class);
    }
    public function program_audio_files()
    {
        return $this->hasMany(ProgramAudioFile::class);
    }

}
