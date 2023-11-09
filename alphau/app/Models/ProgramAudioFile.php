<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramAudioFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_file',
        'program_id'
    ];

    public function programs()
    {
        return $this->belongsTo(Program::class);
    }
}
