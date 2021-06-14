<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    use HasFactory;

    protected $table = 'contains';

    protected $fillable = [
        'news_id',
        'cryptocurrency_id'
    ];

    public function news(){
        $this->belongsTo(News::class);
    }

    public function cryptos(){
        $this->belongsTo(Cryptocurrency::class);
    }
}
