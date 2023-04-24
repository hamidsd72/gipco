<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class NewsCategory extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function news()
    {
        return $this->hasMany('App\Models\News', 'category_id');
    }
    public function news_active()
    {
        return $this->hasMany('App\Models\News', 'category_id')->where('status','active');
    }
    public function news_lasts()
    {
        return $this->hasMany('App\Models\News', 'category_id')->where('status','active')->where('status_archive','pending')->orderByDesc('created_at');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            if(is_file($item->pic))
            {
                File::delete($item->pic);
            }
        });
    }
}