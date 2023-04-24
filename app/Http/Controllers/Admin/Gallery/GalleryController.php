<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Models\GalleryCategory;
use App\Models\Gallery;
use App\Http\Requests\Gallery\GalleryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Spatie\Permission\Models\Permission;
class GalleryController extends Controller
{

    public function controller_title($type)
    {
        switch ($type)
        {
            case 'index':
                return 'گالری ';
                break;
            case 'create':
                return 'افزودن گالری ';
                break;
            case 'edit':
                return 'ویرایش گالری ';
                break;
            case 'url_back':
                return route('admin.galleries.index');
                break;
            default:
                return '';
                break;
        }
    }
      public function __construct()
    {
        $this->middleware('permission:gallery_list', ['only' => ['index','show']]);
        $this->middleware('permission:gallery_create', ['only' => ['create','store']]);
        $this->middleware('permission:gallery_edit', ['only' => ['edit','update','delete']]);
        $this->middleware('permission:gallery_delete', ['only' => ['destroy']]);
        $this->middleware('permission:gallery_status', ['only' => ['status']]);
        $this->middleware('permission:gallery_sort', ['only' => ['sort']]);
    }
    public function index()
    {
        $items=GalleryCategory::orderBy('sort')->get();
        return view('admin.gallery.index', compact('items'), ['title' => $this->controller_title('index')]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        $url_back=$this->controller_title('url_back');
        return view('admin.gallery.create',compact('url_back'), ['title' => $this->controller_title('create')]);
    }
    public function store(GalleryRequest $request)
    {
        try {
            $item = GalleryCategory::create([
                'title' => $request->title,
                'text' => $request->text,
                'status' => $request->status,
                'link' => $request->link,
                'sort' => GalleryCategory::count()+1,
            ]);
            if ($request->hasFile('pic')) {
                $item->pic = file_store($request->pic, 'assets/uploads/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'pic-');
                $item->save();
            }
//            added gallery photos
            if ($request->hasFile('photos'))
            {
                foreach ($request->photos as $photo)
                {
                    $gallery=new Gallery();
                    $gallery->category_id=$item->id;
                    $gallery->type='photo';
                    $gallery->file = file_store($photo, 'assets/uploads/gallery/photos/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'pic-');
                    $gallery->save();
                }
            }
            //            added gallery films
            if ($request->hasFile('films'))
            {
                foreach ($request->films as $film)
                {
                    $gallery=new Gallery();
                    $gallery->category_id=$item->id;
                    $gallery->type='video';
                    $gallery->file = file_store($film, 'assets/uploads/gallery/video/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/video/', 'video-');
                    $gallery->save();
                }
            }
            
            store_lang($item,$request,['title','text','status'],'create');
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت افزوده شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای افزودن به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function edit($id)
    {
        $url_back=$this->controller_title('url_back');
        $item=GalleryCategory::findOrFail($id);
        return view('admin.gallery.edit',compact('url_back','item'), ['title' => $this->controller_title('edit')]);
    }
    public function update(GalleryRequest $request,$id)
    {
        $item=GalleryCategory::findOrFail($id);
        try {
            $item->update([
                'title' => $request->title,
                'text' => $request->text,
                'status' => $request->status,
                'link' => $request->link,
            ]);
            if ($request->hasFile('pic')) {
                if (is_file($item->pic)) {
                    File::delete($item->pic);
                }
                $item->pic = file_store($request->pic, 'assets/uploads/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'pic-');
                $item->update();
            }
//            added gallery photos
            if ($request->hasFile('photos'))
            {
                foreach ($request->photos as $photo)
                {
                    $gallery=new Gallery();
                    $gallery->category_id=$item->id;
                    $gallery->type='photo';
                    $gallery->file = file_store($photo, 'assets/uploads/gallery/photos/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'pic-');
                    $gallery->save();
                }
            }
            //            added gallery films
            if ($request->hasFile('films'))
            {
                foreach ($request->films as $film)
                {
                    $gallery=new Gallery();
                    $gallery->category_id=$item->id;
                    $gallery->type='video';
                    $gallery->file = file_store($film, 'assets/uploads/gallery/video/gallery/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/video/', 'video-');
                    $gallery->save();
                }
            }
             store_lang($item,$request,['title','text','status'],'edit');
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت ویرایش شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای ویرایش به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function destroy($id)
    {
        $item=GalleryCategory::findOrFail($id);
        try {
            $item->delete();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت حذف شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

    public function status($id,$type,$status)
    {
        $item=GalleryCategory::findOrFail($id);
        try {
            $item->$type=$status;
            $item->update();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت تغیر وضعیت شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای تغیر وضعیت به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function sort($id,Request $request)
    {
        $item=GalleryCategory::findOrFail($id);
        try {
            $item->sort=$request->sort;
            $item->update();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت مرتب سازی شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای مرتب کردن به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

    public function delete($id)
    {
        $item=Gallery::findOrFail($id);
        try {
            $item->delete();
            return redirect()->back()->with('flash_message', 'اطلاعات با موفقیت حذف شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
}
