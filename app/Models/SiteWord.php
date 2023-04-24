<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class SiteWord extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function langs()
    {
        return $this->morphMany('App\Models\Lang', 'langs');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($item) {
            if(count($item->langs))
            {
                foreach ($item->langs as $lang)
                {
                    $lang->delete();
                }
            }
        });
    }
    public static function place_oo()
    {
        $res=[
                ['id'=>'هدر','title'=>'هدر'],
          ['id'=>'فوتر','title'=>'فوتر'],
          ['id'=>'منو','title'=>'منو'],
          ['id'=>'زیر-منو','title'=>'زیر منو'],
          ['id'=>'صفحه-اصلی','title'=>'صفحه اصلی'],
          ['id'=>'پیام','title'=>'پیام'],
          ['id'=>'لینک','title'=>'لینک'],
          ['id'=>'جستجو-خودرو','title'=>'جستجو خودرو'],
          ['id'=>'کارد-بلاگ','title'=>'کارد بلاگ'],
          ['id'=>'کارد-خودرو','title'=>'کارد خودرو'],
          ['id'=>'کارد-آپشن-خودرو','title'=>'کارد آپشن خودرو'],
          ['id'=>'هدر-صفحات-داخلی','title'=>'هدر صفحات داخلی'],
          ['id'=>'صفحه-نهایی-اجاره-خودرو','title'=>'صفحه نهایی اجاره خودرو'],
          ['id'=>'صفحه-تماس','title'=>'صفحه تماس با ما'],
          ['id'=>'صفحه-داخلی-بلاگ','title'=>'صفحه داخلی بلاگ'],
          ['id'=>'ارور-فرم','title'=>'ارور فرم'],
          ['id'=>'رسید','title'=>'رسید'],
            ['id'=>'اطلاعات-تکمیلی','title'=>'اطلاعات تکمیلی'],
            ['id'=>'صفحه-ورود','title'=>'صفحه ورود'],
        ];
        return $res;
    }
}