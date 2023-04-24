<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\Navbar;
use App\Models\Photo;
use App\Http\Requests\Setting\NavbarRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use settingbon\settingbon;

class NavbarController extends Controller
{
    public function controller_title($type)
    {
        switch ($type)
        {
            case 'index':
                return 'لینک های نوار';
                break;
            case 'create':
                return 'افزودن لینک';
                break;
            case 'edit':
                return 'ویرایش لینک';
                break;
            case 'url_back':
                return route('admin.navbar.index');
                break;
            default:
                return '';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('permission:navbar_list', ['only' => ['index','show']]);
        $this->middleware('permission:navbar_create', ['only' => ['create','store']]);
        $this->middleware('permission:navbar_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:navbar_delete', ['only' => ['destroy']]);
        $this->middleware('permission:navbar_status', ['only' => ['status']]);
    }

    public function index()
    {
        $items=Navbar::orderBy('sort')->get();
        return view('admin.setting.navbar.index', compact('items'), ['title' => $this->controller_title('index')]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        $url_back=$this->controller_title('url_back');
        $sort=Navbar::count()+1;
        $links=Navbar::where('parent_id', null)->orderBy('sort')->get(['title','id']);
        return view('admin.setting.navbar.create',compact('url_back','sort','links'), ['title' => $this->controller_title('create')]);
    }
    public function store(NavbarRequest $request)
    {
        try {
            $item = Navbar::create([
                'parent_id' => $request->parent_id,
                'type'      => $request->type,
                'section'   => $request->section,
                'title'     => $request->title,
                'link'      => $request->link,
                'sort'      => $request->sort,
                'status'    => $request->status,
            ]);
            //create slider
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->type = 'photo';
                $photo->path = file_store($request->photo, 'assets/uploads/setting/navbar/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }

            store_lang($item,$request,['title','status'],'create');

            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت افزوده شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای افزودن به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function edit($id)
    {
        $url_back=$this->controller_title('url_back');
        $item=Navbar::findOrFail($id);
        $links=Navbar::where('parent_id', null)->orderBy('sort')->get(['title','id']);
        return view('admin.setting.navbar.edit',compact('url_back','item','links'), ['title' => $this->controller_title('edit')]);
    }
    public function update(NavbarRequest $request,$id)
    {
        $item=Navbar::findOrFail($id);
        try {
            Navbar::where('id',$id)->update([
                'parent_id' => $request->parent_id,
                'type'      => $request->type,
                'section'   => $request->section,
                'title'     => $request->title,
                'link'      => $request->link,
                'sort'      => $request->sort,
                'status'    => $request->status,
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
                $photo->path = file_store($request->photo, 'assets/uploads/setting/navbar/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }

            store_lang($item,$request,['title','status'],'edit');

            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت ویرایش شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای ویرایش به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function destroy($id)
    {
        $item=Navbar::findOrFail($id);
        if ($item->child()->count()) return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، آیتم دارای زیردسته میباشد');
        try {
            $item->delete();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت حذف شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

    public function status($id,$type,$status)
    {
        $item=Navbar::findOrFail($id);
        try {
            $item->$type=$status;
            $item->update();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت تغییر وضعیت شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای تغییر وضعیت به مشکل خوردیم، مجدد تلاش کنید');
        }
    }

}
