@if($item)
  <article class="blog-card bg-white rounded p-0 h4-ft-product-card bg-white  ">
    <figure class="feature-img position-relative overflow-hidden rounded-top mb-0">
      <a href="{{route('front.blog.show',[app()->getLocale(),$item->type,$item->id])}}">
        <img src="{{$item->photo && is_file($item->photo->path)?url($item->photo->path):url('assets/front/img/home1/blog-1.jpg')}}" alt="{{$item->title}}" class="img-fluid new-img-fluid">
        <img src="{{$item->photo && is_file($item->photo->path)?url($item->photo->path):url('assets/front/img/home1/blog-1.jpg')}}" alt="{{$item->title}}" class="img-fluid2">
      </a>
    </figure>
   <div class="p-3 text_card_blog">
     <a href="{{route('front.blog.show',[app()->getLocale(),$item->type,$item->id])}}" class="small-btn-meta text-primary bg-primary-light">{{$item->type=='article'?read_lang_word('کارد-بلاگ','type1'):read_lang_word('کارد-بلاگ','type2')}}</a>
     <a href="{{route('front.blog.show',[app()->getLocale(),$item->type,$item->id])}}">
       <h5 class="mt-3 mb-3 blog-title">{{read_lang($item,'title')}}</h5>
     </a>
     <div class="blog-card-bottom mt-3 d-flex align-items-center justify-content-between flex-wrap" dir="ltr">
       <div class="blog-card-author d-inline-flex align-items-center">
         <div class="blog-card-author-details {{dir_set()=='ltr'?'ms-3':'me-3'}}">
           <strong class="fw-bold text-secondary d-block">{{read_lang($item,'author')}}</strong>
           <span class="date">{{Carbon\Carbon::parse($item->created_at)->toFormattedDateString()}}</span>
         </div>
       </div>
       <a href="{{route('front.blog.show',[app()->getLocale(),$item->type,$item->id])}}" class="blog-explore-btn d-flex align-items-center justify-content-center rounded-circle"><i class="fa-solid fa-arrow-right-long"></i></a>
     </div>
   </div>
  </article>
@endif