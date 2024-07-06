<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'DanhMuc';

    protected $fillable = [
        'title',
        'img',
        'desc',
    ];

    public function tintucs()
    {
        return $this->hasMany(TinTuc::class, 'id_category');
    }
}
