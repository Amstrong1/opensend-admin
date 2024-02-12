<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interac extends Model
{
    use HasFactory;

    protected $table = 'interacs';

    protected $append = ['formatted_status', 'formatted_date'];

    public function getFormattedStatusAttribute()
    {
        $status = '';
        if ($this->status == 'pending') {
            $status = 'En attente';
        }
        if ($this->status == 'progress') {
            $status = 'En cours';
        }
        if ($this->status == 'denied') {
            $status = 'Refusé';
        }
        if ($this->status == 'done') {
            $status = 'Effectué';
        }
        return $status;
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
}
