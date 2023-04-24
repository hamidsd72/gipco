<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Banner extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
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