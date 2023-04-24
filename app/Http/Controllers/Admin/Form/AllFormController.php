<?php

namespace App\Http\Controllers\Admin\Form;

use App\Models\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use settingbon\settingbon;

class AllFormController extends Controller
{
    public function controller_title($type)
    {
        switch ($type)
        {
            case 'contact':
                return 'فرم تماس با ما';
                break;
            default:
                return '';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('permission:form_contact_list', ['only' => ['contact']]);
    }

    public function contact()
    {
        $items=ContactForm::orderBYDesc('id')->get();
        return view('admin.form.contact', compact('items'), ['title' => $this->controller_title('contact')]);
    }

}
