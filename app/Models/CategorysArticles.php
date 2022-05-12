<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorysArticles extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->hasOne(Article::class,'id','article_id');
    }
}
