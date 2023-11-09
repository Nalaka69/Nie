<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramArchive extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'program_genre',
        'program_directory',
        'is_visible'
    ];
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function day_archives()
    {
        return $this->hasMany(DayArchive::class);
    }
}
