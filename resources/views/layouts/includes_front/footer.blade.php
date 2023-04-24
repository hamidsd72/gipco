<!--footer section start-->
<footer class="footer-section d-none-print">
  <div class="footer-wrapper pt-5 position-relative z-1 overflow-hidden" data-background="{{url('assets/front/img/shapes/texture-bg.png')}}">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg">
          <div class="footer-widget widget-basic">
            <h3 class="widget-title-large mb-4 text-white">{{read_lang($about_footer,'title')}}</h3>
            <div class="px-3 pe-lg-5">
              <p class="mb-40">{!! read_lang($about_footer,'text') !!}</p>
            </div>
          </div>
        </div>

        <div class="col-lg">
          <div class="{{dir_set()=='ltr'?'ms-lg-5':'me-lg-5'}} {{dir_set()=='ltr'?'ms-xl-0':'me-xl-0'}} mt-5 mt-lg-0">
            <div class="footer-widget footer-nav-widget mb-5 mb-sm-0">
              <h3 class="widget-title text-white mb-3">{{read_lang_word('فوتر','lets-talk')}}</h3>
                <form action="{{ route('front.contact.us.post', app()->getLocale()) }}" method="post">
                  @csrf
                  <input type="text" name="name" class="form-control" placeholder="{{read_lang_word('فوتر','form-fullname')}}" required>
                  <input type="email" name="email" class="form-control" placeholder="{{read_lang_word('فوتر','form-email-address')}}" required>
                  <textarea name="message" rows="4" class="form-control mb-3" placeholder="{{read_lang_word('فوتر','form-insert-message')}}"></textarea>
                  <button type="submit" class="btn btn-sm btn-outline-primary">{{read_lang_word('فوتر','get-a-quote')}}</button>
                </form>
            </div>
          </div>
        </div>

      </div>


      <div class="row justify-content-between pt-lg-5">

        <div class="col-lg">
          <div class="footer-widget widget-basic">
            <a href="{{ route('front.index',app()->getLocale()) }}" class="footer-logo d-inline-block"><img class="bounce-left" src="{{$logo}}" alt="{{$titleSeo}}"></a>
            <div class="pe-3 pt-3 small">
              {!! read_lang($about_footer,'text1') !!}
            </div>
            {{-- @if(!blank($contact_info->phone) && explode(',',$contact_info->phone)>0)
              <div class="phone-box d-flex align-items-center">
                <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary text-white"><i class="flaticon-phone-call"></i></span>
                <h4 class="text-white {{dir_set()=='ltr'?'ms-3':'me-3'}} mb-0"  dir="ltr">{{explode(',',$contact_info->phone)[0]}}</h4>
              </div>
            @endif --}}
          </div>
        </div>

        <div class="col-lg">
          <div class="footer-widget footer-nav-widget mb-5 mb-sm-0">
            <div class="row">
              @foreach ($links as $link)
                <div class="col-lg">

                  <h5 class="widget-title text-white mb-3">{!! read_lang($link,'title') !!}</h5>
  
                  @if ($link->child()->count())
                    <ul class="footer-nav">
                      @foreach ($link->child as $child)
                        <li><a href="{{ $child->link ? $child->link : '#' }}">{!! read_lang($child,'title') !!}</a></li>
                      @endforeach
                    </ul>
                  @endif
                  
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="col-lg">
          <div class="footer-widget footer-nav-widget mb-5 mb-sm-0">
            <h5 class="widget-title text-white mb-3">{{read_lang_word('فوتر','contact-info')}}</h5>
            <ul class="footer-nav">
              <li><i class="fa fa-map-marker-alt px-2 footer-socials fs-4"></i><a href="#">{!! read_lang($contact,'address') !!}</a><hr class="text-muted my-2"></li>
              <li><i class="fa fa-phone px-2 footer-socials fs-4"></i><a href="callto:{{$contact->phone}}">{{ read_lang($contact,'phone') }}</a><hr class="text-muted my-2"></li>
              <li><i class="fa fa-envelope px-2 footer-socials fs-4"></i><a href="mailto:{{$contact->email}}">{{ read_lang($contact,'email') }}</a></li>
            </ul>
          </div>
        </div>

        {{-- <div class="col-lg">
          <div class="{{dir_set()=='ltr'?'ms-lg-5':'me-lg-5'}} {{dir_set()=='ltr'?'ms-xl-0':'me-xl-0'}} mt-5 mt-lg-0">
            <div class="row align-items-center">
              <div class="col-6">
                @if($contact_info->telegram || $contact_info->instagram || $contact_info->facebook || $contact_info->twitter || $contact_info->youtube || $contact_info->whatsapp_group)
                <div class="text-end">
                  <div class="footer-social d-inline-block text-start">
                    <h6 class="text-white">{{read_lang_word('فوتر','social')}}</h6>
                    <ul class="footer-social-list">
                      @if($contact_info->telegram)
                        <li><a href="{{$contact_info->telegram}}"><i class="fab fa-telegram"></i></a></li>
                      @endif
                      @if($contact_info->instagram)
                          <li><a href="{{$contact_info->instagram}}"><i class="fab fa-instagram"></i></a></li>
                      @endif
                      @if($contact_info->facebook)
                          <li><a href="{{$contact_info->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                      @endif
                      @if($contact_info->twitter)
                          <li><a href="{{$contact_info->twitter}}"><i class="fab fa-twitter"></i></a></li>
                      @endif
                      @if($contact_info->youtube)
                          <li><a href="{{$contact_info->youtube}}"><i class="fab fa-youtube"></i></a></li>
                      @endif
                      @if($contact_info->whatsapp_group)
                          <li><a href="{{$contact_info->whatsapp_group}}"><i class="fab fa-whatsapp"></i></a></li>
                      @endif
                    </ul>
                  </div>
                </div>
                  @endif
              </div>
            </div>

            <div class="row mt-30">
              <div class="col-sm-8">
                <iframe class="iframe_footer" src="{{$contact_info->address_iframe}}"></iframe>
              </div>
            </div>
            
          </div>
        </div> --}}

      </div>

    </div>


    <div class="footer-copyright mt-2 mt-lg-3">
      <div class="container">
        <div class="row align-items-center" dir="ltr">
          <div class="col-sm-7">
            <div class="copyright-text">
              <p class="mb-0">&copy; All rights reserved. Made by <a href="https://adib-it.com/fa" target="_blank">AdibGroup</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</footer>