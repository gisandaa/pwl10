<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Blog as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image', 'title', 'content','penulis','tanggal'
    ];
}
