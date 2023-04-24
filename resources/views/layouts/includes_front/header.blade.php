<!--header area start-->
<header class="header-style-one header-sticky d-none-print">
  {{-- <div class="at_topbar d-none d-sm-block bg-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-3 col-8">
          <div class="tp-info">
            <p class="mb-0">{{read_lang_word('هدر','welcome')}}</p>
          </div>
        </div>
        <div class="col-xl-9 col-4">
          <div class="tp-info-wrapper d-flex align-items-center justify-content-end">
            <div class="d-none tp-info d-xl-inline-flex align-items-center">
                                    <span class="icon-wrapper {{dir_set()=='ltr'?'me-2':'ms-2'}}">
                                      <i class="flaticon-location"></i>
                                  </span>
              <p class="mb-0">{{read_lang($contact_info,'address')}}</p>
            </div>
            @if(!blank($contact_info->phone) && explode(',',$contact_info->phone)>0)
            <div class="tp-info d-inline-flex align-items-center">
                                    <span class="icon-wrapper {{dir_set()=='ltr'?'me-2':'ms-2'}}">
                                      <i class="flaticon-phone-call"></i>
                                  </span>
              <p class="mb-0" dir="ltr">{{explode(',',$contact_info->phone)[0]}}</p>
            </div>
            @endif
            @if(!blank($contact_info->email) && explode(',',$contact_info->email)>0)
            <div class="d-none tp-info d-xl-inline-flex align-items-center">
                                    <span class="icon-wrapper {{dir_set()=='ltr'?'me-2':'ms-2'}}">
                                      <i class="flaticon-email"></i>
                                  </span>
              <p class="mb-0" dir="ltr">{{explode(',',$contact_info->email)[0]}}</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="at_header_nav py-1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-auto">
          <div class="logo-wrapper">
            <a href="{{ route('front.index',app()->getLocale()) }}"><img class="bounce-left" src="{{$logo}}" alt="{{$titleSeo}}"></a>
          </div>
        </div>
        <div class="col">
          <div class="at_header_right d-flex align-items-center justify-content-start">
            <nav class="at_nav_menu d-none d-lg-block">
              <ul>
                @foreach ($links as $link)
                  <li class="{{ $link->child()->count() ? 'has-submenu' : '' }}">
                    <a href="{{ $link->link ? $link->link : '#' }}">{!! read_lang($link,'title') !!}</a>

                    @if ($link->child()->count())
                      <ul class="submenu-wrapper">
                        @foreach ($link->child as $child)
                          <li><a href="{{ $child->link ? $child->link : '#' }}">{!! read_lang($child,'title') !!}</a></li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach

                <li class="has-submenu lang_menu1 float-end">
                  <a href="javascript:void(0)"> 
                    <img src="{{url(site_lang()->photo->path)}}" class="lang_menu" alt="{{site_lang()->lang}}">
                  </a> 
                  <ul class="submenu-wrapper menu_lang d-lg-block d-none">
                    @foreach(menu_langs() as $lang)
                      <li>
                          {{-- <a href="{{route('front.lang_set',[app()->getLocale(),$lang->lang])}}">
                            <img src="{{url($lang->photo->path)}}" class="lang_menu" alt="{{$lang->lang}}">
                          </a> --}}
                          <a href="{{url('/').'/'.str_replace(app()->getLocale(),strtolower($lang->lang),request()->path())}}">
                            <img src="{{url($lang->photo->path)}}" class="lang_menu" alt="{{$lang->lang}}">
                          </a>
                      </li>
                    @endforeach
                  </ul>
                </li>

                <li class="float-end"><a class="nav-email-cdfw2342 rounded" href="mailto:info@gipcogermany.com">{{read_lang_word('صفحه-تماس','email')}}</a></li>

              </ul>
            </nav>
            @if(auth()->check() && auth()->id()==1)
              <a href="{{route('login')}}" class="listing-btn1 text-white {{dir_set()=='ltr'?'ms-1':'me-1'}}">
                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-white mx-2">
                  <i class="fa-solid fa-user"></i>
                </span>
              </a>
            @endif
            <ul class="submenu-wrapper menu_lang d-lg-none d-flex">
              @foreach(menu_langs() as $lang)
                <li class="px-1">
                  <a href="{{url('/').'/'.str_replace(app()->getLocale(),strtolower($lang->lang),request()->path())}}">
                  {{-- <a href="{{route('front.lang_set',[app()->getLocale(),$lang->lang])}}"> --}}
                    <img src="{{url($lang->photo->path)}}" class="lang_menu" alt="{{$lang->lang}}">
                  </a>
                </li>
              @endforeach
            </ul>
            <button class="mobile-menu-toggle header-toggle-btn {{dir_set()=='ltr'?'ms-4':'me-4'}} d-lg-none">
              <span></span>
              <span></span>
              <span></span>
            </button>

          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--header area end-->
