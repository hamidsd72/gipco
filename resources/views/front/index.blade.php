@extends('layouts.front')
@section('styles')
 <link rel="stylesheet" href="{{url('assets/front/css/fancybox.css')}}">
@endsection
@section('body')

  <!--hero section start-->
  <section class="dealership-hero position-relative overflow-hidden">
    <div class="swiper at-hero-slider-wrapper" data-speed="900">
      <div class="swiper-wrapper">
        @if(count($sliders))
          @foreach($sliders as $slider)
            @if ($slider->photo && is_file($slider->photo->path))
              {{-- @if($slider->title1=='not')<style>.dl-hero-single {padding: 150px 0 0 0 ;}</style>@endif --}}
              <div class="swiper-slide">
                {{-- <div class="dl-hero-single" @if($slider->title1=='not')  @else data-background="{{url('assets/front/img/shapes/texture-bg.png')}}" @endif>
                  @if($slider->title1=='not')
                    <img src="{{$slider->photo && is_file($slider->photo->path)?url($slider->photo->path):url('source/Slıder1.jpg')}}" class="w-100" alt="...">
                  @else --}}
                  <div class="container-fluid">
                    <div class="at_hero_slider">
                      <div class="row">
                        <div class="col-xl-5">
                          <div class="at-hero-title">
                            <span class="at-subtitle text-primary position-relative fw-bold">{{read_lang($slider,'title1')}}</span>
                            <h1 class="text-white mb-4 mt-3 display-4">{{read_lang($slider,'title2')}}</h1>
                            {!! read_lang($slider,'text') !!}
                            @if(!blank($slider->link))
                              <a href="{{$slider->link}}" class="at-explore-btn"><span class="{{dir_set()=='ltr'?'me-2':'ms-2'}}">
                                <svg width="49" height="28" viewBox="0 0 49 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M42.5 9L47.715 14.1189M47.715 14.1189L42.5 19.3339M47.715 14.1189H19.5" stroke="#f4a717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="1" y="1" width="32" height="26" rx="13" stroke="#f4a717" stroke-width="2"/>
                                </svg>
                                </span>{{read_lang_word('لینک','more')}}
                              </a>
                            @endif
                          </div>
                        </div>
                        <div class="col-xl-7">
                          <div class="at-hero-banner position-relative mt-1 mt-sm-0">
                            <img src="{{$slider->photo && is_file($slider->photo->path)?url($slider->photo->path):url('assets/images/1.png')}}" alt="car" class="at_hero_car">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- @endif
                </div> --}}
              </div>
            @endif
          @endforeach
        @endif
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <a href="#brands" class="position-absolute btn-scroll-down d-none d-xl-block"><span class="me-2">
      <svg width="49" height="28" viewBox="0 0 49 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M42.5 9L47.715 14.1189M47.715 14.1189L42.5 19.3339M47.715 14.1189H19.5" stroke="#f4a717" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <rect x="1" y="1" width="32" height="26" rx="13" stroke="#f4a717" stroke-width="2"/>
      </svg>
      </span>
    </a>
    @if($contact_home->telegram || $contact_home->instagram || $contact_home->facebook || $contact_home->twitter || $contact_home->youtube || $contact_home->whatsapp_group)
      <div class="at-header-social d-none d-sm-flex align-items-center position-absolute">
        <span class="title">{{read_lang_word('صفحه-اصلی','slider_social')}}</span>
        <ul class="social-list {{dir_set()=='ltr'?'ms-3':'me-3'}}">
          @if($contact_home->telegram)
            <li><a href="{{$contact_home->telegram}}"><i class="fab fa-telegram"></i></a></li>
          @endif
          @if($contact_home->instagram)
            <li><a href="{{$contact_home->instagram}}"><i class="fab fa-instagram"></i></a></li>
          @endif
          @if($contact_home->facebook)
            <li><a href="{{$contact_home->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
          @endif
          @if($contact_home->twitter)
            <li><a href="{{$contact_home->twitter}}"><i class="fab fa-twitter"></i></a></li>
          @endif
          @if($contact_home->youtube)
            <li><a href="{{$contact_home->youtube}}"><i class="fab fa-youtube"></i></a></li>
          @endif
          @if($contact_home->whatsapp_group)
            <li><a href="{{$contact_home->whatsapp_group}}"><i class="fab fa-whatsapp"></i></a></li>
          @endif
        </ul>
      </div>
    @endif
  </section>
  <!--hero section end-->

  <!--search box -->
    @include('front.includes.car_search',['form'=>'yes','place'=>null,'from_date'=>null,'to_date'=>null,'mt'=>null])
  <!--search box end-->
@if(count($services))
  <!--service section start-->
  <section class="blog-section pt-20 overflow-hidden pb-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="at-section-title text-center">
            <span class="at-subtitle position-relative text-primary lead">{{read_lang_word('صفحه-اصلی','service1')}}</span>
            <h2 class="mt-2 h1">{{read_lang_word('صفحه-اصلی','service2')}}</h2>
          </div>
        </div>
      </div>
      <div class="blog-card-wrapper mt-2">
        <div class="h4-categories-slider-wrapper overflow-hidden px-0">
          <div class="s4_ct_slider_2 h4-categories-slider swiper overflow-visible">
            <div class="swiper-wrapper">
              @foreach($services as $service)
                <div class="swiper-slide px-1">
                  @include('front.service.includes.card',['item'=>$service])
                </div>
              @endforeach
            </div>
            <div class="flash-controls sflash-button-prev flash-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            <div class="flash-controls sflash-button-next flash-button-next"><i class="fa-solid fa-angle-right"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--service section end-->
@endif
@if(count($gallery))
 <!--add center start-->
        <section class="add-center pt-60" data-background="{{url('assets/front/img/shapes/banner-bg.jpg')}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6">
                        <div class="at-section-title text-center">
                            <span class="at-subtitle position-relative lead text-primary shape-primary">{{read_lang_word('صفحه-اصلی','gallery1')}}</span>
                            <h2 class="h1 text-white mt-2 mb-30">{{read_lang_word('صفحه-اصلی','gallery2')}}</h2>
                            <a href="{{route('front.gallery',app()->getLocale())}}" class="btn btn-primary">{{read_lang_word('صفحه-اصلی','gallery3')}}</a>
                        </div>
                    </div>
                </div>
                <div class="banner-slider swiper pb-80 mt-5">
                    <div class="swiper-wrapper">
                        @foreach($gallery as $gall)
                        <div class="single-banner swiper-slide gallery_card_index">
                           @include('front.gallery.includes.card',['gall'=>$gall])
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!--add center end-->
@endif
  <!--about section start-->
  <section class="about-section pt-60 pb-60 bg-primary-light position-relative z-1 overflow-hidden"
           data-background="{{url('assets/front/img/shapes/about-bg.jpg')}}">
    <img src="{{url('assets/front/img/shapes/tire-primary-light.png')}}" alt="tire"
         class="tire-primary-light position-absolute end-0 top-0 z--1">
    <span class="small-circle-shape position-absolute z--1"></span>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-6">
          <div class="about-left position-relative z-1">
            <span class="circle-large position-absolute z--1"></span>
            <div class="at-section-title mb-20">
              <span class="at-subtitle position-relative lead text-primary">{{read_lang_word('صفحه-اصلی','about1')}}</span>
              <h2 class="h1 mt-2 mb-4">{{read_lang($about,'title')}}</h2>
              {!! read_lang($about,'text') !!}
            </div>
            <img src="{{is_file($about->pic)?url($about->pic):url('assets/front/img/home1/car-red.png')}}"
                 alt="{{$about->title}}" class="img-fluid">
          </div>
        </div>
        <div class="col-xl-6 col-lg-6">
          <div class="about-right mt-5 mt-lg-0">
            @if(read_lang($about,'text1'))
              <div class="about-icon-box bg-white shadow rounded">
                {!! read_lang($about,'text1') !!}
              </div>
            @endif
            @if(read_lang($about,'text2'))
              <div class="about-icon-box bg-white shadow rounded mt-20 {{dir_set()=='ltr'?'ms-md-5':'me-md-5'}}">
                {!! read_lang($about,'text2') !!}
              </div>
            @endif
            @if(read_lang($about,'text3'))
              <div class="about-icon-box bg-white shadow rounded mt-20">
                {!! read_lang($about,'text3') !!}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--about section end-->

  @if(count($blogs))
  <!--blog section start-->
  <section class="blog-section pt-20 overflow-hidden pb-20">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="at-section-title text-center">
            <span class="at-subtitle position-relative text-primary lead">{{read_lang_word('صفحه-اصلی','blog1')}}</span>
            <h2 class="mt-2 h1">{{read_lang_word('صفحه-اصلی','blog2')}}</h2>
          </div>
        </div>
      </div>
      <div class="blog-card-wrapper mt-2">
        <div class="h4-categories-slider-wrapper overflow-hidden px-0">
          <div class="h4_ct_slider_2 h4-categories-slider swiper overflow-visible">
            <div class="swiper-wrapper">
              @foreach($blogs as $blog)
              <div class="swiper-slide px-1">
                @include('front.blog.includes.card',['item'=>$blog])
              </div>
              @endforeach
            </div>
            <div class="flash-controls flash-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            <div class="flash-controls flash-button-next"><i class="fa-solid fa-angle-right"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--blog section end-->
  @endif


@endsection
@section('scripts')
<script src="{{url('assets/front/js/fancybox.js')}}"></script>
   @include('front.includes.req')
@endsection
