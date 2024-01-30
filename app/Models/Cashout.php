<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashout extends Model
{
    use HasFactory;

    protected $table = 'payment_transactions';
    
    protected $append = ['formatted_date', 'formatted_status', 'user_name'];

    public function getFormattedDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }

    public function getFormattedStatusAttribute()
    {
        if ($this->status == 'pending') {
            $status = 'En cours';
        } else {
            $status = 'Transféré';
        }
        
        return $status;
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
