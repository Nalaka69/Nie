<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutomationAudioFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'automation_file',
        'duration',
        'automation_id'
    ];

    public function automations()
    {
        return $this->belongsTo(Automation::class);
    }
}
