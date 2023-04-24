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
                <hr>

                <div class="card-body">
                    {{ Form::open(array('route' => 'admin.gallery.store', 'method' => 'POST','id'=>'form_req','files'=>true)) }}
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{Form::label('title', ' عنوان *')}}
                                                {{Form::text('title', null, array('class' => 'form-control','required'))}}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{Form::label('status', 'وضعیت  *')}}
                                                {{ Form::select('status', ['active'=>'انتشار','pending'=>'عدم انتشار'], null, array('class' => 'form-control select2-show-search custom-select','required')) }}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {{Form::label('text', 'متن *')}}
                                            <div class="form-group form-group-post">
                                                {{Form::textarea('text', null, array('class' => 'form-control textarea_ltr','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {{Form::label('link', 'لینک')}}
                                            <div class="form-group form-group-post">
                                                {{Form::url('link', null, array('class' => 'form-control'))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach(tab_langs() as $lang)
                                <div class="tab-pane fade {{$lang->align=='ltr'?'ltr_tab':''}}" id="nav-{{$lang->lang}}" role="tabpanel" aria-labelledby="nav-{{$lang->lang}}-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::label('title_'.$lang->lang, ' عنوان')}}
                                                    {{Form::text('title_'.$lang->lang, null, array('class' => 'form-control'))}}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{Form::label('status_'.$lang->lang, 'وضعیت  *')}}
                                                    {{ Form::select('status_'.$lang->lang, ['pending'=>'عدم انتشار','active'=>'انتشار'], null, array('class' => 'form-control select2-show-search custom-select','required')) }}
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12">
                                                {{Form::label('text_'.$lang->lang, 'متن')}}
                                                <div class="form-group form-group-post">
                                                    {{Form::textarea('text_'.$lang->lang, null, array('class' => 'form-control textarea_'.$lang->align))}}
                                                </div>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('pic', 'تصویر اصلی * ')}}
                                {{Form::file('pic', array('class' => 'dropify','data-height'=>'180','accept' => '.jpg,.jpeg','required'))}}
                            </div>
                            <p class="text-danger">_<small>حداکثر حجم تصویر 4Mb می باشد</small></p>
                            <p class="text-danger">_<small>بهترین سایز تصویر ارتفاع کمی کوچکتر از عرض می باشد</small></p>
                            <p class="text-danger">_<small>فرمت تصویر فقط باید JPG,JPEG باشد</small></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    {{Form::label('photos','تصاویر')}}
                                    <div class="input-group mb-5 file-browser">
                                        <input type="text" class="form-control browse-file" placeholder="تصاویر خود را جهت آپلود انتخاب نمایید" readonly>
                                        <label class="input-group-append">
												<span class="btn btn-primary">
													انتخاب
                                                    {{Form::file('photos[]', array('class' => 'file-browserinput d-none','accept' => '.jpg,.png,.jpeg','multiple'))}}
												</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger">_<small>حداکثر حجم هر تصویر 4Mb می باشد</small></p>
                            <p class="text-danger">_<small>بهترین سایز تصویر ارتفاع و عرض کوچکتر از 1400 پیکسل باشد</small></p>
                            <p class="text-danger">_<small>فرمت تصویر فقط باید PNG,JPG,JPEG باشد</small></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    {{Form::label('films', 'ویدئو')}}
                                    <div class="input-group mb-5 file-browser">
                                        <input type="text" class="form-control browse-file" placeholder="ویدئوهای خود را جهت آپلود انتخاب نمایید" readonly>
                                        <label class="input-group-append">
												<span class="btn btn-primary">
													انتخاب
                                                    {{Form::file('films[]', array('class' => 'file-browserinput d-none','accept' => '.mp4','multiple'))}}
												</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <p class="text-danger">_<small>حداکثر حجم هر ویدئو 30Mb می باشد</small></p>
                            <p class="text-danger">_<small>فرمت ویدئو فقط باید  MP4 باشد</small></p>
                        </div>
                        <div class="col-md-12 text-left">
                            <hr/>
                            {{Form::submit('افزودن',array('class'=>'btn btn-primary','onclick'=>"return confirm('برای ارسال فرم مطمئن هستید؟')"))}}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
