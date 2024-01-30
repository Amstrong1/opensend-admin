<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;

    protected $table = 'cashouts';
    
    protected $append = ['formatted_date', 'user_name'];

    public function getFormattedDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }

    public function getUserNameAttribute()
    {        
        return $this->user->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
