<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'resume',
        'description',
        'image'
    ];

    public function contains(){
        return $this->hasMany(Contain::class);
    }
    /**
     * Relacion
     */
    public function criptocurrency(){
        return $this->belongsToMany(Cryptocurrency::class, 'contains', 'news_id' , 'cryptocurrency_id');
    }
}
