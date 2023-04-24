<?php

namespace App\Http\Requests\Gallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|max:240',
                    'link' => 'nullable',
                    'pic' => "required|image|mimes:jpeg,jpg|max:4096",
                    'photos.*' => "nullable|image|mimes:jpeg,jpg,png|max:4096",
                    'films.*' => "nullable|mimes:mp4|max:30720",
                ];
            }
            case 'PATCH':
            {
                $id=$this->request->get('id');

                return [
                    'title' => 'required|max:240',
                    'link' => 'nullable',
                    'pic' => "nullable|image|mimes:jpeg,jpg|max:4096",
                    'photos.*' => "nullable|image|mimes:jpeg,jpg,png|max:4096",
                    'films.*' => "nullable|mimes:mp4|max:30720",
                ];
            }
            default:
                break;
        }
    }
}
