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
                    {{ Form::model($item,array('route' => array('admin.about.update',$item->id),'id'=>'form_req', 'method' => 'PATCH','files'=>true)) }}
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{Form::label('title', ' عنوان *')}}
                                                {{Form::text('title', null, array('class' => 'form-control','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {{Form::label('text', 'متن *')}}
                                                {{Form::textarea('text', null, array('class' => 'form-control textarea_ltr','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 {{$item->type=='conditions'?'d-none':''}}">
                                            <div class="form-group">
                                                {{Form::label('text1', 'متن1 *')}}
                                                {{Form::textarea('text1', null, array('class' => 'form-control textarea_ltr','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 {{$item->type=='footer' || $item->type=='conditions'?'d-none':''}}">
                                            <div class="form-group">
                                                {{Form::label('text2', 'متن2 *')}}
                                                {{Form::textarea('text2', null, array('class' => 'form-control textarea_ltr','required'))}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 {{$item->type=='footer' || $item->type=='conditions'?'d-none':''}}">
                                            <div class="form-group">
                                                {{Form::label('text3', 'متن3 *')}}
                                                {{Form::textarea('text3', null, array('class' => 'form-control textarea_ltr','required'))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach(tab_langs() as $lang)
                                <div class="tab-pane fade {{$lang->align=='ltr'?'ltr_tab':''}}" id="nav-{{$lang->lang}}" role="tabpanel" aria-labelledby="nav-{{$lang->lang}}-tab">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{Form::label('title_'.$lang->lang, ' عنوان')}}
                                                    {{Form::text('title_'.$lang->lang, read_lang($item,'title',$lang->lang), array('class' => 'form-control'))}}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{Form::label('text_'.$lang->lang, 'متن')}}
                                                    {{Form::textarea('text_'.$lang->lang, read_lang($item,'text',$lang->lang), array('class' => 'form-control textarea_'.$lang->align))}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    {{Form::label('text1_'.$lang->lang, 'متن1')}}
                                                    {{Form::textarea('text1_'.$lang->lang,  read_lang($item,'text1',$lang->lang), array('class' => 'form-control textarea_'.$lang->align))}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 {{$item->type=='footer'?'d-none':''}}">
                                                <div class="form-group">
                                                    {{Form::label('text2_'.$lang->lang, 'متن2')}}
                                                    {{Form::textarea('text2_'.$lang->lang,  read_lang($item,'text2',$lang->lang), array('class' => 'form-control textarea_'.$lang->align))}}
                                                </div>
                                            </div>
                                            <div class="col-md-12 {{$item->type=='footer'?'d-none':''}}">
                                                <div class="form-group">
                                                    {{Form::label('text3_'.$lang->lang, 'متن3')}}
                                                    {{Form::textarea('text3_'.$lang->lang,  read_lang($item,'text3',$lang->lang), array('class' => 'form-control textarea_'.$lang->align))}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-12 {{$item->type=='footer'?'d-none':''}}">
                            <div class="form-group">
                                {{Form::label('pic', 'تصویر ')}}
                                {{Form::file('pic', array('class' => 'dropify','data-height'=>'180','accept' => '.jpg,.jpeg','data-default-file'=>is_file($item->pic)?url($item->pic):null))}}
                            </div>
                            <p class="text-danger">_<small>حداکثر حجم تصویر 4Mb می باشد</small></p>
                            <p class="text-danger">_<small>بهترین سایز تصویر عرض 1100 پیکسل در ارتفاع 280 پیکسل می باشد</small></p>
                            <p class="text-danger">_<small>فرمت تصویر فقط باید JPG,JPEG باشد</small></p>
                        </div>
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
