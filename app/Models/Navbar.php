<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Navbar extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function child()
    {
        return $this->hasMany('App\Models\Navbar', 'parent_id');
    }
    
    public function photo()
    {
        return $this->morphOne('App\Models\Photo', 'pictures')->where('status','active')->where('type','photo');
    }

    public function langs()
    {
        return $this->morphMany('App\Models\Lang', 'langs');
    }
    
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            if(is_file($item->pic)) File::delete($item->pic);
        });
    }
}