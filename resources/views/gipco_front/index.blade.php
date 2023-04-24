@extends('layouts.front')
@section('styles')
 {{-- <link rel="stylesheet" href="{{url('assets/front/css/fancybox.css')}}"> --}}
@endsection
@section('body')


<!--hero section start-->
@if(count($sliders))
  <section class="dealership-hero position-relative overflow-hidden">
    @foreach($sliders as $slider)
        @if ($slider->photo && is_file($slider->photo->path))
        
            <div class="container-fluid p-0">
                <img src="{{$slider->photo && is_file($slider->photo->path)?url($slider->photo->path):url('assets/images/1.png')}}" class="w-100" alt="{{read_lang($slider,'title1')}}">

                <div class="slider-box-clop94j234 container">
                  <div class="col-lg-6">
                    <span data-aos="fade-left" class="at-subtitle text-white position-relative fs-6 fw-bold">{{read_lang($slider,'title1')}}</span>
                    <h1 class="text-white m-0 mb-2 my-lg-4" data-aos="fade-right">{{read_lang($slider,'title2')}}</h1>
                    <div data-aos="fade-left">{!! read_lang($slider,'text') !!}</div>
                    @if(!blank($slider->link))
                      <a href="{{$slider->link}}" data-aos="fade-right" class="bounce-left at-explore-btn px-2 p-lg-2 px-lg-3 mt-lg-4 rounded">
                        {{read_lang_word('صفحه-اصلی','sloder-title-xsdf1')}}
                      </a>
                    @endif
                  </div>
                </div>

            </div>

        @endif
    @endforeach
  </section>
@endif
<!--end hero section start-->
    

<!--service section start-->
@if(count($services))
  <section class="blog-section overflow-hidden py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="at-section-title text-center">
            <span class="at-subtitle position-relative text-primary lead">{{read_lang_word('صفحه-اصلی','service1')}}</span>
            {{-- <h2 class="mt-2 h1">{{read_lang_word('صفحه-اصلی','service2')}}</h2> --}}
          </div>
        </div>
      </div>
      <div class="blog-card-wrapper mt-4 row">
        @foreach($services as $service)
          <div class="col-lg mb-4 mb-lg-0 cursor-pointer" data-aos="fade-up" onclick="location.href='{{ $service->link ? $service->link : '#' }}'">
            @include('front.service.includes.card',['item'=>$service])
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
<!--service section end-->


<!--add center start-->
@if(count($gallery))
  <section class="add-center pt-60" data-background="{{url('assets/front/img/shapes/banner-bg.jpg')}}">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-xl-5 col-lg-6">
                  <div class="at-section-title text-center">
                      <span class="at-subtitle position-relative lead text-primary shape-primary">{{read_lang_word('صفحه-اصلی','gallery1')}}</span>
                      {{-- <h2 class="h1 text-white mt-2 mb-30">{{read_lang_word('صفحه-اصلی','gallery2')}}</h2>
                      <a href="{{route('front.gallery',app()->getLocale())}}" class="btn btn-primary">{{read_lang_word('صفحه-اصلی','gallery3')}}</a> --}}
                  </div>
              </div>
          </div>
          <div class="row py-lg-5">
            {{-- <div class="banner-slider swiper pb-80 mt-5">
                <div class="swiper-wrapper"> --}}
                    @foreach($gallery as $key => $gall)
                      <div class="col-lg-6 mb-5">
                        <div class="single-banner swiper-slide gallery_card_index p-lg-2">
                            @include('front.gallery.includes.card',['gall'=>$gall, 'key'=>$key, 'anim'=>$key%2? 'fade-left':'fade-right' ])
                        </div>
                      </div>
                    @endforeach
                {{-- </div>
                <div class="swiper-pagination"></div>
            </div> --}}
          </div>
      </div>
  </section>
@endif
<!--add center end-->


<!--blog section start-->
@if(count($brands))
  <section class="blog-section pt-20 overflow-hidden pb-20">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="at-section-title text-center">
            <span class="at-subtitle position-relative text-primary lead">{{read_lang_word('صفحه-اصلی','brands')}}</span>
            {{-- <h2 class="mt-2 h1">{{read_lang_word('صفحه-اصلی','blog2')}}</h2> --}}
          </div>
        </div>
      </div>
      <div class="blog-card-wrapper mt-2" data-aos="fade-up">
        <div class="h4-categories-slider-wrapper overflow-hidden px-0">
          <div class="h4_ct_slider_2 h4-categories-slider swiper overflow-visible">
            <div class="swiper-wrapper">
              @foreach($brands as $item)
                @if ($item->photo && is_file($item->photo->path))
                  <div class="swiper-slide px-3 px-lg-0">
                    {{-- @include('front.blog.includes.card',['item'=>$item]) --}}
                    <article class="blog-card rounded p-0 h4-ft-product-card">
                      <figure class="feature-img position-relative overflow-hidden rounded-top mb-0">
                          {{-- <img src="{{url($item->photo->path)}}" alt="{{$item->title}}" class="img-fluid new-img-fluid"> --}}
                          <img src="{{url($item->photo->path)}}" alt="{{$item->title}}" class="img-fluid2">
                      </figure>
                    </article>
                  </div>
                @endif
              @endforeach
            </div>
            <div class="flash-controls flash-button-prev"><i class="fa-solid fa-angle-left"></i></div>
            <div class="flash-controls flash-button-next"><i class="fa-solid fa-angle-right"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
<!--blog section end-->

@endsection
@section('scripts')
  {{-- <script src="{{url('assets/front/js/fancybox.js')}}"></script> --}}
   @include('front.includes.req')
@endsection
