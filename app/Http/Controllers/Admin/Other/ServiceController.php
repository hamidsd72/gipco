<?php

namespace App\Http\Controllers\Admin\Other;

use App\Models\Service;
use App\Models\Photo;
use App\Http\Requests\Other\ServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use otherbon\otherbon;

class serviceController extends Controller
{
    public function controller_title($type)
    {
        switch ($type)
        {
            case 'index':
                return 'خدمات';
                break;
            case 'create':
                return 'افزودن خدمت';
                break;
            case 'edit':
                return 'ویرایش خدمت';
                break;
            case 'url_back':
                return route('admin.service.index');
                break;
            default:
                return '';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('permission:service_list', ['only' => ['index','show']]);
        $this->middleware('permission:service_create', ['only' => ['create','store']]);
        $this->middleware('permission:service_edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service_delete', ['only' => ['destroy']]);
        $this->middleware('permission:service_status', ['only' => ['status']]);
    }

    public function index()
    {
        $items=Service::orderByDesc('id')->get();
        return view('admin.other.service.index', compact('items'), ['title' => $this->controller_title('index')]);
    }
    public function show($id)
    {

    }
    public function create()
    {
        $url_back=$this->controller_title('url_back');
        return view('admin.other.service.create',compact('url_back'), ['title' => $this->controller_title('create')]);
    }
    public function store(ServiceRequest $request)
    {
        try {
            $item = Service::create([
                'title' => $request->title,
                'text' => $request->text,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            //create service
            if ($request->hasFile('photo')) {
                $photo = new Photo();
                $photo->type = 'photo';
                $photo->path = file_store($request->photo, 'assets/uploads/other/service/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
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
        $item=Service::findOrFail($id);
        return view('admin.other.service.edit',compact('url_back','item'), ['title' => $this->controller_title('edit')]);
    }
    public function update(ServiceRequest $request,$id)
    {
        $item=Service::findOrFail($id);
        try {
            Service::where('id',$id)->update([
                'title' => $request->title,
                'text' => $request->text,
                'link' => $request->link,
                'status' => $request->status,
            ]);
            //edit service
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
                $photo->path = file_store($request->photo, 'assets/uploads/other/service/' . my_jdate(date('Y/m/d'), 'Y-m-d') . '/photos/', 'photo-');
                $item->photo()->save($photo);
            }

            store_lang($item,$request,['title','text','status'],'edit');

            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت ویرایش شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای ویرایش به مشکل خوردیم، مجدد تلاش کنید');
        }
    }
    public function destroy($id)
    {
        $item=Service::findOrFail($id);
        try {
            $item->delete();
            return redirect($this->controller_title('url_back'))->with('flash_message', 'اطلاعات با موفقیت حذف شد');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('err_message', 'برای حذف به مشکل خوردیم، مجدد تلاش کنید');
        }
    }


}
