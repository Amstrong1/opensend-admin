<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $append = ['formatted_date', 'user_name', 'replier'];

    public function getFormattedDateAttribute()
    {
        return getFormattedDate($this->created_at);
    }

    public function getUserNameAttribute()
    {        
        return $this->user->name;
    }

    public function getReplierAttribute()
    {        
        return User::where('id', $this->admin_id)->first()->name ?? "";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
