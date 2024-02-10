<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'detail', 'user_id']; // Define the fillable fields

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
