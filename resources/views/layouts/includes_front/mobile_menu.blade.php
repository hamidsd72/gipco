<!--mobile menu start-->
<div class="mobile-menu position-fixed bg-white deep-shadow d-none-print">
  <button class="close-menu position-absolute"><i class="fa-solid fa-xmark"></i></button>

  <a href="{{ route('front.index',app()->getLocale()) }}" class="logo-wrapper bg-secondary d-block mt-4 p-3 rounded-1 text-center"><img src="{{$logo}}" alt="{{$titleSeo}}" class="img-fluid"></a>
  <nav class="mobile-menu-wrapper mt-40">
    <ul>
      @foreach ($links as $link)
        <li class="{{ $link->child()->count() ? 'has-submenu' : '' }}">
          <a >{!! read_lang($link,'title') !!}</a>

          @if ($link->child()->count())
            <ul class="submenu-wrapper">
              @foreach ($link->child as $child)
                <li><a href="{{ $child->link ? $child->link : '#' }}">{!! read_lang($child,'title') !!}</a></li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
      {{-- <li><a href="{{route('front.index',app()->getLocale())}}">{{read_lang_word('منو','1')}}</a></li>
      
      <li class="has-submenu"><a class="#" href="">Services</a>
        <ul class="submenu-wrapper">
          <li><a class="#" href="#">Shipment & logistic</a></li>
          <li><a class="#" href="#">Consultation</a></li>
          <li><a class="#" href="#">Financing</a></li>
        </ul>
      </li>

      <li class="has-submenu"><a class="#" href="">Industries</a>
        <ul class="submenu-wrapper">
          <li><a class="#" href="#">Steel Industry</a></li>
          <li><a class="#" href="#">Automotive Industry</a></li>
          <li><a class="#" href="#">Electronics Industry</a></li>
          <li><a class="#" href="#">Oil, Gas, and Petrochemical Industry</a></li>
        </ul>
      </li>

      <li class="has-submenu"><a class="#" href="">About Us</a>
        <ul class="submenu-wrapper">
          <li><a class="#" href="#">Catalog</a></li>
          <li><a class="#" href="#">imprint</a></li>
        </ul>
      </li>

      <li><a class="#" href="#">Contact Us</a></li> --}}

    </ul>
  </nav>
  <div class="contact-info mt-60">
    <h4 class="mb-20">{{read_lang_word('صفحه-تماس','r_title')}}</h4>
    <p>{{read_lang($contact_info,'address')}}</p>
    @if(!blank($contact_info->phone) && explode(',',$contact_info->phone)>0)
    <p dir="ltr">{{explode(',',$contact_info->phone)[0]}}</p>
    @endif
      @if(!blank($contact_info->email) && explode(',',$contact_info->email)>0)
    <p dir="ltr">{{explode(',',$contact_info->email)[0]}}</p>
    @endif
    <div class="social-contact">
      @if($contact_info->telegram)
       <a href="{{$contact_info->telegram}}"><i class="fab fa-telegram"></i></a>
      @endif
      @if($contact_info->instagram)
        <a href="{{$contact_info->instagram}}"><i class="fab fa-instagram"></i></a>
      @endif
      @if($contact_info->facebook)
        <a href="{{$contact_info->facebook}}"><i class="fab fa-facebook-f"></i></a>
      @endif
      @if($contact_info->twitter)
        <a href="{{$contact_info->twitter}}"><i class="fab fa-twitter"></i></a>
      @endif
      @if($contact_info->whatsapp_group)
        <a href="{{$contact_info->whatsapp_group}}"><i class="fab fa-whatsapp"></i></a>
      @endif
    </div>
  </div>
</div>
<!--mobile menu end-->