@if($gall)
 {{-- <a href="{{url($gall->pic)}}" data-fancybox="gallery_gall{{$gall->id}}" data-caption="<h5>{{read_lang($gall,'title')}}</h5>">
                                <img src="{{url($gall->pic)}}" alt="{{read_lang($gall,'title')}}" class="img-fluid">
                                <img src="{{url($gall->pic)}}" alt="{{read_lang($gall,'title')}}" class="img-fluid2">
                                <h5>{{read_lang($gall,'title')}}</h5>
                                </a>
                                @if(count($gall->galleries))
                                    @foreach($gall->galleries as $gall_in)
                                        <a href="{{url($gall_in->file)}}" class="d-none" data-fancybox="gallery_gall{{$gall->id}}" data-caption="<h5>{{read_lang($gall,'title')}}</h5>"></a>
                                    @endforeach    
                                @endif
                                
                                @if(read_lang($gall,'text'))
                                    <style>
                                        div[data-index="{{count($gall->galleries)+1}}"] img
                                         {
                                           display: none;
                                        }
                                        div[data-index="{{count($gall->galleries)+1}}"] .fancybox__caption
                                         {
                                            overflow-y: auto!important;
                                            height: 100%!important;
                                           
                                        }
                                    </style>
                                    <a href="{{url('assets/front/dis_text.jpg')}}" class="d-none"
                                       data-fancybox="gallery_gall{{$gall->id}}"
                                       data-caption="<h5>{{read_lang($gall,'title')}}</h5></br>
                                    <div style='margin-top:15px;padding-top:15px;border-top:1px solid #e8e8e8'>{!! read_lang($gall,'text') !!}</div>">
                                    </a>
                                @endif --}}




    <div data-aos="{{$anim}}">
        <img src="{{url($gall->pic)}}" alt="{{read_lang($gall,'title')}}" class="img-fluid w-100 rounded">
        <div class="card-box-description-clk443jds">
            <h5>{{read_lang($gall,'title')}}</h5>
            <div class="text bg-light rounded">
                {!! read_lang($gall,'text') !!}
                <div class="pt-lg-4"><a class="nav-email-cdfw2342 rounded" href="{{ $gall->link ? $gall->link : '#' }}">{{read_lang_word('صفحه-اصلی','read-more')}}</a></div>
            </div>
        </div>
    </div>
@endif