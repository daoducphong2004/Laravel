<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class Comment extends Model
    {
        use HasFactory;
    
        protected $fillable = [
            'tintuc_id',
            'user_id',
            'parent_id',
            'content',
        ];
    
        public function user()
        {
            return $this->belongsTo(taikhoan::class);
        }
    
        public function tintuc()
        {
            return $this->belongsTo(TinTuc::class, 'tintuc_id');
        }
    
        public function replies()
        {
            return $this->hasMany(Comment::class, 'parent_id');
        }
    
        public function parent()
        {
            return $this->belongsTo(Comment::class, 'parent_id');
        }
    }