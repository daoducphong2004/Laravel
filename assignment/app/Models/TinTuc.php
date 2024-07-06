<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    use HasFactory;

    protected $table = 'TinTuc';

    protected $fillable = [
        'Title',
        'image',
        'desc',
        'content',
        'view',
        'like',
        'id_author',
        'id_category',
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo(DanhMuc::class, 'id_category');
    }

    public function author()
    {
        return $this->belongsTo(taikhoan::class, 'id_author');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'tintuc_id')->whereNull('parent_id');
    }
}
