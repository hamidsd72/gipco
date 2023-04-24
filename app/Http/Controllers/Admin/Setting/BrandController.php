<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\Brand;
use App\Models\Photo;
use App\Http\Requests\Setting\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use settingbon\settingbon;

class BrandController extends Controller
{
    public function controller_title($type)
    {
        switch ($type)
        {
            case 'index':
                return 'برند';
                break;
            case 'create':
                return 'افزودن برند';
                break;
            case 'edit':
                return 'ویرایش برند';
                break;
            case 'url_back':
                return route('admin.brand.index');
                break;
            default:
                return '';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('permission:brand_list', ['only' => ['index','show']]);
        $this->middleware('permission:brand_create', ['only' => ['create','store']]);
        $this->middleware('permission:brand_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:brand_delete', ['only' => ['destroy']]);
        $this->middleware('permission:brand_status', ['only' => ['status']]);
    }

    public function index()
    {
        $items=Brand::orderBy('sort')->get();
        return view('admin.setting.brand.index', compact('items'), ['title' => $this->controller_title('index')]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        $url_back=$this->controller_title('url_back');
        $sort=Brand::count()+1;
        return view('admin.setting.brand.create',compact('url_back','sort'), ['title' => $this->controller_title('create')]);
    }
    public function store(BrandRequest $request)
    {
        try {
            $item = Brand::create([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'text' => $request->text,
                'link' => $request->link,
                'sort' => $request->sort,
                'status' => $request->status,
            ]);
            //create slider
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->type = 'photo';
                $photo->path = file_store($request->photo, 'assets/uploads/setting/slider/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }

            store_lang($item,$request,['title1','title2','text','status'],'create');

            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت افزوده شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای افزودن به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function edit($id)
    {
        $url_back=$this->controller_title('url_back');
        $item=Brand::findOrFail($id);
        return view('admin.setting.brand.edit',compact('url_back','item'), ['title' => $this->controller_title('edit')]);
    }
    public function update(BrandRequest $request,$id)
    {
        $item=Brand::findOrFail($id);
        try {
            Brand::where('id',$id)->update([
                'title1' => $request->title1,
                'title2' => $request->title2,
                'text' => $request->text,
                'link' => $request->link,
                'sort' => $request->sort,
                'status' => $request->status,
            ]);
            //edit slider
            if ($request->hasFile('photo')) {
                if($item->photo)
                {
                    if(is_file($item->photo->path))
                    {
                        File::delete($item->photo->path);
                    }
                    $item->photo->delete();
                }
                $photo = new Photo();
                $photo->type = 'photo';
                $photo->path = file_store($request->photo, 'assets/uploads/setting/Slider/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }

            store_lang($item,$request,['title1','title2','text','status'],'edit');

            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت ویرایش شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای ویرایش به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function destroy($id)
    {
        $item=Brand::findOrFail($id);
        try {
            $item->delete();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت حذف شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

    public function status($id,$type,$status)
    {
        $item=Brand::findOrFail($id);
        try {
            $item->$type=$status;
            $item->update();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت تغییر وضعیت شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای تغییر وضعیت به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

}
