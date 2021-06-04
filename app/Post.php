<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    // Kolom yang wajib di isi
    protected $fillable = [
        'title', 'content', 'category_id', 'featured', 'slug', 'users_id'
    ];

    protected $dates = ['deleted_at'];

    // jika 1 post hanya memiliki kategori maka sesuaikan juga nama fungsinya menjadi tunggal
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Relasi Many ke Tag
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    // Relasi ke Tabel User
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}