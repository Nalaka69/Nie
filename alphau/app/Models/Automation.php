<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automation extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'automation_episode',
        'automation_url',
        'is_visible',
        'program_directory',
        'archive_id'
    ];
    public function program_archives()
    {
        return $this->belongsTo(ProgramArchive::class);
    }
    public function automation_audio_files()
    {
        return $this->hasMany(AutomationAudioFile::class);
    }
}
