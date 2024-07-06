<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class taikhoan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'taikhoan';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tintucs()
    {
        return $this->hasMany(TinTuc::class, 'id_author');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
