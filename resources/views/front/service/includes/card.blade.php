@if($item)
  <article class="blog-card rounded p-0 h4-ft-product-card">
    <figure class="pt-4 mb-0 feature-img position-relative overflow-hidden">
      <a><img src="{{$item->photo && is_file($item->photo->path)?url($item->photo->path):url('assets/front/img/home1/blog-1.jpg')}}" alt="{{$item->title}}" class="img-fluid service-img-fluid"></a>
    </figure>
    <div class="pt-4 text_card_service text-center">
      <a><h5 class="blog-title fs-4 ">{{read_lang($item,'title')}}</h5></a>
      {{-- <p>{{read_lang($item,'text')}}</p> --}}
    </div>
  </article>
@endif