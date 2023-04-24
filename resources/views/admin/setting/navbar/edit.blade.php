@extends('layouts.admin',['req'=>true,'editor'=>true,'file_upload'=>true])

@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">
                        {{$title}}
                    </h4>
                </div>

                <div class="card-body">
                    {{ Form::model($item,array('route' => array('admin.navbar.update',$item->id),'id'=>'form_req', 'method' => 'PATCH','files'=>true)) }}
                    {{Form::hidden('id', $item->id)}}
                    <div class="row">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-en-tab" data-toggle="tab" data-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">EN</button>
                                @foreach(tab_langs() as $lang)
                                    <button class="nav-link" id="nav-{{$lang->lang}}-tab" data-toggle="tab" data-target="#nav-{{$lang->lang}}" type="button" role="tab" aria-controls="nav-{{$lang->lang}}" aria-selected="false">{{$lang->lang}}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content w-100" id="nav-tabContent">
                            <div class="tab-pane fade show active ltr_tab" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                              {{Form::label('status', 'وضعیت  *')}}
                                              {{ Form::select('status', ['active'=>'انتشار','pending'=>'عدم انتشار'], null, array('class' => 'form-control select2-show-search custom-select','data-placeholder'=>'انتخاب کنید',)) }}
                                            </div>
                                          </div>
                                          <div class="col-md">
                                            <div class="form-group">
                                              {{Form::label('parent_id', 'زیردسته ی کدام لینک باشد ')}}
                                              <select name="parent_id" id="parent_id" class="form-control select2-show-search custom-select" >
                                                <option value="">دسته اصلی باشد</option>
                                                @foreach ($links as $link)
                                                  <option value="{{$link->id}}" @if ($item->parent_id == $link->id) selected @endif>{{$link->title}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              {{Form::label('title', 'عنوان * ')}}
                                              {{Form::text('title',null, array('class' => 'form-control','required'))}}
                                            </div>
                                          </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                {{Form::label('title2', 'عنوان bold * ')}}
                                                {{Form::text('title2',null, array('class' => 'form-control','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{Form::label('text', 'متن ')}}
                                                {{Form::textarea('text',null, array('class' => 'form-control textarea_ltr'))}}
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @foreach(tab_langs() as $lang)
                                <div class="tab-pane fade {{$lang->align=='ltr'?'ltr_tab':''}}" id="nav-{{$lang->lang}}" role="tabpanel" aria-labelledby="nav-{{$lang->lang}}-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::label('status_'.$lang->lang, 'وضعیت  *')}}
                                                    {{ Form::select('status_'.$lang->lang, ['pending'=>'عدم انتشار','active'=>'انتشار'], read_lang($item,'status',$lang->lang), array('class' => 'form-control select2-show-search custom-select','data-placeholder'=>'انتخاب کنید',)) }}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::label('title_'.$lang->lang, 'عنوان ')}}
                                                    {{Form::text('title_'.$lang->lang,read_lang($item,'title1',$lang->lang), array('class' => 'form-control'))}}
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::label('title2_'.$lang->lang, 'عنوان bold ')}}
                                                    {{Form::text('title2_'.$lang->lang,read_lang($item,'title2',$lang->lang), array('class' => 'form-control'))}}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{Form::label('text_'.$lang->lang, 'متن ')}}
                                                    {{Form::textarea('text_'.$lang->lang,read_lang($item,'text',$lang->lang), array('class' => 'form-control '.$lang->align=='ltr'?'textarea_ltr':'textarea_rtl'))}}
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('link', 'لینک ')}}
                                {{Form::text('link',null, array('class' => 'form-control d-ltr text-left'))}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              {{Form::label('type', 'مکان  *')}}
                              {{ Form::select('type', ['top'=>'هدر','footer'=>'فوتر','both'=>'هدر و فوتر'], null, array('class' => 'form-control select2-show-search custom-select','data-placeholder'=>'انتخاب کنید',)) }}
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              {{Form::label('section', 'لیست (برای فوتر) ')}}
                              {{ Form::select('section', ['1'=>'لیست اول','2'=>'لیست دوم'], null, array('class' => 'form-control select2-show-search custom-select','data-placeholder'=>'انتخاب کنید',)) }}
                            </div>
                          </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('sort', 'ترتیب ')}}
                                {{Form::number('sort',null, array('class' => 'form-control d-ltr text-left'))}}
                            </div>
                        </div>
                        {{-- <div class="col-md-8">
                            <div class="form-group">
                                {{Form::label('photo', 'تصویر ')}}
                                {{Form::file('photo', array('class' => 'dropify','data-height'=>'180','accept' => '.jpg,.jpeg,.png','data-default-file'=>$item->photo && is_file($item->photo->path)?url($item->photo->path):null))}}
                            </div>
                            <p class="text-danger">_<small>حداکثر حجم تصویر 2Mb می باشد</small></p>
                            <p class="text-danger">_<small>بهترین سایز تصویر عرض 600 پیکسل در ارتفاع 400 پیکسل می باشد</small></p>
                            <p class="text-danger">_<small>فرمت تصویر فقط باید PNG,JPG,JPEG باشد</small></p>
                        </div> --}}

                        <div class="col-md-12 text-left">
                            <hr/>
                            {{Form::submit('ویرایش',array('class'=>'btn btn-primary','onclick'=>"return confirm('برای ارسال فرم مطمئن هستید؟')"))}}
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>


@endsection
@push('in_tag_script')

@endpush