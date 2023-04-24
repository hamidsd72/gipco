<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{dir_set()}}" {{font_farsi()}}>
<head>
    <!--required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--twitter og-->
    <meta name="twitter:title" @if(trim($__env->yieldContent('title_seo'))) content="@yield('title_seo')" @else content="{{$titleSeo}}"  @endif/>
    <meta name="twitter:keywords" @if(trim($__env->yieldContent('keyword'))) content="@yield('keyword')" @else content="{{$keywordsSeo}}" @endif/>
    <meta name="twitter:description" @if(trim($__env->yieldContent('description'))) content="@yield('description')" @else content="{{$descriptionSeo}}" @endif/>
    <meta name="twitter:image" content="{{$fav_icon}}" />

    <!--facebook og-->
    <meta property="og:url" content="{{$urlPage}}" />
    <meta name="twitter:title" @if(trim($__env->yieldContent('title_seo'))) content="@yield('title_seo')" @else content="{{$titleSeo}}"  @endif/>
    <meta property="og:keywords" @if(trim($__env->yieldContent('keyword'))) content="@yield('keyword')" @else content="{{$keywordsSeo}}" @endif/>
    <meta property="og:description" @if(trim($__env->yieldContent('description'))) content="@yield('description')" @else content="{{$descriptionSeo}}" @endif/>
    <meta property="og:image" content="{{$fav_icon}}" />

    <!--meta-->
    <meta name="keywords" @if(trim($__env->yieldContent('keyword'))) content="@yield('keyword')" @else content="{{$keywordsSeo}}" @endif/>
    <meta name="description" @if(trim($__env->yieldContent('description'))) content="@yield('description')" @else content="{{$descriptionSeo}}" @endif/>
    <meta name="author" content="adib-it" />

    <meta name="base_url" content="{{url('')}}">

    <!--favicon icon-->
    <link rel="icon" href="{{$fav_icon}}" type="image/png" sizes="16x16" />

    <!--title-->
    <title>@if(trim($__env->yieldContent('title_seo'))) @yield('title_seo') @else {{$titleSeo}} @endif</title>

    <!--build:css-->
    <link rel="stylesheet" href="{{url('assets/front/css/main.css')}}" />
    <!-- endbuild -->
    {{-- <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "esgjhxoitd");
    </script> --}}
    <!--custom css-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/front/css/custom.css')}}" />
    @if(dir_set()=='rtl')
        <link rel="stylesheet" href="{{url('assets/front/css/rtl.css')}}" />
    @endif
    @if(font_farsi()=='yes')
     <style>
         h1,h2,h3,h4,h5,h6,p,strong,span,input,select,textarea,optgroup,button,li,a,small,label,td,th,div
         {
             font-family:IRANSans , sans-serif!important;
         }
    
         p,strong,span,input,select,textarea,optgroup,button,li,a,label,td,th,div
         {
             font-size:14px;
         }
     </style>
    @endif
    <style>
        .modal-body .at-search-box
        {
            padding: 0;
        }
        .modal-body .pt-mobile-15px
        {
            padding-top: 15px;
        }
        .modal-body .w-mobile-100
        {
            width: 100%;
        }
        .modal-body .ms-2
        {
            margin-left: 0!important;
        }




        @-webkit-keyframes bounce-left{0%{-webkit-transform:translateX(-48px);transform:translateX(-48px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:1}24%{opacity:1}40%{-webkit-transform:translateX(-26px);transform:translateX(-26px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}65%{-webkit-transform:translateX(-13px);transform:translateX(-13px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}82%{-webkit-transform:translateX(-6.5px);transform:translateX(-6.5px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}93%{-webkit-transform:translateX(-4px);transform:translateX(-4px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}25%,55%,75%,87%,98%{-webkit-transform:translateX(0);transform:translateX(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}100%{-webkit-transform:translateX(0);transform:translateX(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}}@keyframes bounce-left{0%{-webkit-transform:translateX(-48px);transform:translateX(-48px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:1}24%{opacity:1}40%{-webkit-transform:translateX(-26px);transform:translateX(-26px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}65%{-webkit-transform:translateX(-13px);transform:translateX(-13px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}82%{-webkit-transform:translateX(-6.5px);transform:translateX(-6.5px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}93%{-webkit-transform:translateX(-4px);transform:translateX(-4px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}25%,55%,75%,87%,98%{-webkit-transform:translateX(0);transform:translateX(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}100%{-webkit-transform:translateX(0);transform:translateX(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}}
        .cursor-pointer {
            cursor: pointer;
        }
        .form-control {
            background: transparent;
            border-bottom: 1px solid gray;
            border-radius: 0px;
            color: white !important;
        }
        .form-control:focus {
            border-color: gray;
            background-color: transparent !important;
        }
        .form-control::placeholder {
            color: white !important;
            font-size: 18px;
        }
        .at_header_nav {
            background: #f5f5f5;
        }
        .header-style-one {
            border-bottom: none;
        }
        .logo-wrapper img {
            width: 145px;
        }
        .at_nav_menu ul li.has-submenu::after {
            right: -2px;
            color: #4b4f58;
        }
        .at_nav_menu ul li a { 
            color: #4b4f58;
            padding-left: 16px;
        }
        .at_nav_menu ul li:hover > a , .at_nav_menu ul li a.active {
            color: #334181;
        }
        .at_nav_menu ul li.has-submenu .submenu-wrapper {
            background: #fff;
        }
        .nav-email-cdfw2342 {
            color: #fff !important;
            background: #334181;
            border: 1px solid #334181;
            height: 36px;
            margin-top: 22px;
            padding: 4px 8px !important;
        }
        .nav-email-cdfw2342:hover {
            transition: 0.2s;
            color: #334181 !important;
            background: #fff;
        }
        .slider-box-clop94j234 p {
            color: #fff;
        }
        .slider-box-clop94j234 .at-explore-btn {
            color: #fff;
            background: #334181;
            border:1px solid #334181;
        }
        .slider-box-clop94j234 .at-explore-btn:hover {
            transition: 0.2s;
            color: #334181;
            background: #fff;
        }
        article.blog-card {
            background: #fff;
        }
        article.blog-card:hover {
            transition: 0.2s;
            background: #E9E9E9;
        }
        .bounce-left:hover {
            -webkit-animation:bounce-left .8s both;
            animation:bounce-left .8s both
        }
        .gallery_card_index {
            height: 300px;
        }
        .gallery_card_index img {
            position: unset;
            object-fit: unset !important;
            filter: brightness(75%);
            height: 300px;
        }
        .card-box-description-clk443jds {
            z-index: 99;
            position: relative;
            top: -300px;
            height: 300px;
            overflow: hidden;
            cursor: pointer;
        }
        .card-box-description-clk443jds .text {
            height: 0px;
            top: -300px;
            position: relative;
            margin: 2px;
            overflow: hidden;
        }
        .gallery_card_index h5 {
            position: unset;
            padding-top: 130px;
            height: 300px;
        }
        .card-box-description-clk443jds a {
            padding: 12px 18px !important;
        }
        .footer-socials:hover {
            transition: 0.4s;
            color: #f4a717 !important;
            transform: rotate(360deg);
        }
        .dealership-hero {
            margin-top: unset;
        }
        .slider-box-clop94j234 {
            position: relative;
        }
        .add-center {
            max-height: unset;
        }
        @media (min-width: 992px) {
            .gallery_card_index h5 {
                font-size: 32px;
            }
            .card-box-description-clk443jds:hover .text {
                padding: 36px
            }
            .card-box-description-clk443jds:hover .text {
                transition: 0.5s;                
                height: 296px;
            }
            .dealership-hero , .dealership-hero img  {
                max-height: 960px;
            }
            .slider-box-clop94j234 {
                top: -720px;
            }
            .slider-box-clop94j234 p {
                line-height: 36px;
                font-size: 18px;
            }
            .at_header_right {
                width: 100%;
            }
            .at_header_right nav {
                width: 100%;
            }
            .at_nav_menu ul li.has-submenu:hover > .submenu-wrapper {
                margin-top: 8px;
            }
            .at_nav_menu ul li.has-submenu:hover > .menu_lang {
                margin-top: unset;
            }
        }
        @media (max-width: 640px) {
            .dealership-hero {
                max-height: 212px;
            }
            .slider-box-clop94j234 {
                top: -210px;
            }
            .slider-box-clop94j234 p {
                font-size: 12px;
                margin: 0px
            }
            .slider-box-clop94j234 h1 {
                font-size: 16px;
            }
            .gallery_card_index , .gallery_card_index img {
                height: 200px;
            }
            .card-box-description-clk443jds {
                top: -200px;
                height: 200px;
            }
            .gallery_card_index h5 {
                padding-top: 80px;
                height: 200px;
            }
        }

    </style>
    @yield ('styles')

    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11026977193"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-11026977193');
    </script> --}}
    <!-- Meta Pixel Code -->
    {{-- <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '879143183128080');
    fbq('track', 'PageView');
    </script> --}}
    {{-- <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=879143183128080&ev=PageView&noscript=1"/></noscript> --}}
    <!-- End Meta Pixel Code -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css"/>
    <!-- datetimepicker jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
   </script>
</head>

<body>
    {{-- loading --}}
    {{-- <div class="ring-preloader w-100 h-100 position-fixed start-0 top-0 d-none-print">
        <div class="lds-dual-ring">
            <div class="text-center"></div>
        </div>
    </div> --}}

    <!--main content wrapper start-->
    <div class="main-wrapper">

        @include('layouts.includes_front.header')

        @include('layouts.includes_front.mobile_menu')

        {{-- @include('layouts.includes_front.offcanvus_menu') --}}

        @include('layouts.includes_front.breadcrumb')
        
        @yield ('body')

        @include('layouts.includes_front.footer')

    </div>
    <!-- main content wrapper ends -->

    <!--scrolltop button-->
    <button class="theme-scrolltop-btn d-none-print"><i class="fa-regular fa-hand-pointer"></i></button>
    <!--scrolltop button end-->

    <!--build:js-->
    <script src="{{url('assets/front/js/vendors/jquery-ui.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/appear.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/popper.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/easing.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/swiper.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/massonry.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/bootstrap-slider.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/magnific-popup.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/waypoints.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/counterup.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/isotop.pkgd.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/moment.min.js')}}"></script>
    {{-- <script src="{{url('assets/front/js/vendors/date-picker.min.js')}}"></script> --}}
    <script src="{{url('assets/front/js/vendors/progressbar.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/slick.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/countdown.min.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/custom-scrollbar.js')}}"></script>
    <script src="{{url('assets/front/js/vendors/price-range.js')}}"></script>
    <script src="{{url('assets/front/js/app.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--endbuild-->
        <!-- sweetalert2 js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        AOS.init();

        @if(session()->has('err_message'))
        $(document).ready(function () {
            Swal.fire({
                title:"{{read_lang_word('پیام','danger_msg')}}",
                text: "{{ session('err_message') }}",
                icon: "warning",
                timer: 6000,
                timerProgressBar: true,
            })
        });
        @endif
        @if(session()->has('flash_message'))
        $(document).ready(function () {
            Swal.fire({
                title:"{{read_lang_word('پیام','success_msg')}}",
                text: "{{ session('flash_message') }}",
                icon: "success",
                timer: 6000,
                timerProgressBar: true,
            })
        })
        ;@endif
        @if (count($errors) > 0)
        $(document).ready(function () {
            Swal.fire({
                title:"{{read_lang_word('پیام','danger_msg')}}",
                icon: "warning",
                html:
                        @foreach ($errors->all() as $key => $error)
                            '<p class="text-right mt-2 ml-5" dir="rtl"> {{$key+1}} : ' +
                    '{{ $error }}' +
                    '</p>' +
                        @endforeach
                            '<p class="text-right mt-2 ml-5" dir="rtl">' +
                    '</p>',
                timer: @if(count($errors)>3)parseInt('{{count($errors)}}') * 1500 @else 6000 @endif,
                timerProgressBar: true,
            })
        });
        @endif
        $(document).ready(function(){
            $("#exampleModal").modal('show');
        });

        // if($("#pickadateandtimepickup")[0])
        // {
        //     $("#pickadateandtimepickup").flatpickr({
        //         enableTime: true,
        //         dateFormat: "Y-m-d H:i",
        //         disableMobile: "false"
        //     });
        // }
        // if($("#pickadateandtimereturn")[0])
        // {
        //     $("#pickadateandtimereturn").flatpickr({
        //         enableTime: true,
        //         dateFormat: "Y-m-d H:i",
        //         disableMobile: "false"
        //     });
        // }


    </script>
    @yield ('scripts')
    @if($contact_info->whatsapp_car)
    <div class="wat_sapp wat_sapp1 d-none-print">
    <a target="_blank" rel="noreferrer" href="https://api.whatsapp.com/send?phone={{$contact_info->whatsapp_car}}">
        <img class="social_img" src="{{url('assets/front/img/whatss.png')}}" alt="...">
    </a>
    </div>
    @endif

</body>
</html>
