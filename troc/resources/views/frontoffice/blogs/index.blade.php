@extends('frontoffice.index')

@section('content')


<section id="main" class="clearfix">
  

    <div id="services-menu">
      <h5>Catégories</h5>
      <div id="services-menu-container">
        <ul> 
            @foreach ($categories as $category)
          <li>   
            <a href="{{ route('blogs.index', ['category' => $category->id]) }}" class="{{ $category->id == $selectedCategory ? 'active' : '' }}">
              <i class="{{ $category->icon }}"></i>
              <span>{{ $category->name }}</span> 
              <span class="count {{ $category->id == $selectedCategory ? 'active' : '' }}">
              ({{ $category->subcategories->sum(function ($subcategory) {
                return $subcategory->blogs->count();
              })}})
            </span>
            </a>

            <ul class="">
                @foreach ($category->subcategories as $subcategory)
              <li>
                <a class="{{ $subcategory->id == $selectedSubcategory ? 'active' : '' }}" href="{{ route('blogs.index', ['subcategory' => $subcategory->id]) }}">{{ $subcategory->name }}</a> 
                <span class="count {{ $subcategory->id == $selectedSubcategory ? 'active' : '' }}">{{$subcategory->blogs->count()}}</span>
              </li>
              @endforeach
            </ul>       
          </li>
        @endforeach 
        </ul>
      </div>

    

    

      <ins
        class="adsbygoogle"
        style="
          display: inline-block;
          text-align: center;
          width: 100%;
          height: 255px;
          margin-top: 20px;
        "
        data-ad-client="ca-pub-0184352842429596"
        data-ad-slot="1682526228"
      ></ins>
      <!--<script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>-->
    </div>

    <div id="content-container">
      <div id="filters" class="clearfix">
        <div id="filter-ads-members">
          <span class="filter opacity-30"
            ><i class="lni-layers vertical-middle xlarge marg-r-XXS"></i
            ><span>Annonces</span></span
          >
          <span class="filter active"
            ><i class="lni-users vertical-middle xlarge marg-r-XXS"></i
            ><span>Membres (929)</span></span
          >
        </div>
        <form
          id="filter-search"
          action="https://www.echange-service.com/bricolage/electricite/membres"
          method="post"
        >
          <input
            type="text"
            name="search"
            value=""
            id="search"
            placeholder="Recherchez dans &laquo; Bricolage &raquo;"
            minlength="3"
            maxlength="30"
            class="marg-r-XXS"
          />
          <button type="submit" name="form_search" class="">
            <i class="lni-search vertical-middle"></i>
          </button>
          <button type="submit" name="form_clear_search">
            <i class="lni-close vertical-middle"></i>
          </button>
        </form>
      </div>

      <!-- Members list -->
      @foreach ($blogs as $blog)
      <div class="member-box clearfix">
        <span class="member-offline">&#9679;</span>
        <div class="member-image">
          <div class="img-container yellow cursor" data-goto="/profil/STE75-">
            @if ($blog->user->profile_photo_url)
            <img src="{{$blog->user->profile_photo_url }}" alt="{{ $blog->user->name }}" />
            @else
            <img src="{{asset('assets/frontoffice/img/EchangeService/avatar_f.png')}}" alt="Default User Photo" class="user-photo">
            @endif
          </div>
        </div>
        <div class="member-content clearfix">
          <div class="member-details">
            <a href="../../profil/STE75-.html" title="">
                <i class="lni-map-marker marg-r-XXS"></i>  
              <i class="lni-star-filled marg-r-XXS text-color2"></i>
              <span>STE75-</span>
            </a>
           <i class="lni-user marg-r-XXS"></i><span>{{$blog->user->name}}</span>
          </div>
          <a href="{{ route('blogs.show',['blog'=> $blog['id']]) }}" class="flex justify-end py-2 px-4 rounded-2xl" >
            <i class="lni-check-box marg-r-XS py-1"></i><span>Voir le Detail</span>
          </a>
        </div>
        
          
            <strong></strong><span class="text-color1"> {{$blog->name}} </span> <br>
           
          
       
      </div>
      @endforeach

    
      <div class="clear"></div>
      <ins
        class="adsbygoogle"
        style="display: block; width: 100%; margin: 20px 0 30px 0"
        data-ad-layout="in-article"
        data-ad-format="fluid"
        data-ad-client="ca-pub-0184352842429596"
        data-ad-slot="6520630379"
      ></ins>
      <!--<script>
              (adsbygoogle = window.adsbygoogle || []).push({});
          </script>-->

      <!-- Pagination -->
      <div class="pagination">
        <span class="pagination-link pagination-active radius-6">1</span
        ><a href="membres/2.html" class="pagination-link radius-6">2</a
        ><a href="membres/3.html" class="pagination-link radius-6">3</a
        ><span class="dot-sep">...</span
        ><a href="membres/117.html" class="pagination-link radius-6">117</a>
      </div>
    </div>
  </section>





<script type="text/javascript" src="{{asset('assets/frontoffice/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/ES.EchangeService.1.css.css')}}"/>
<script type="text/javascript" src="{{asset('assets/frontoffice/js/generate/ES.EchangeService.1.js.php')}}"></script>
<link href="../../../cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet"/>
<script src="{{asset('assets/frontoffice/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontoffice/js/ponyfill/ponyfill.js')}}"></script>

<!-- Analytics -->
<script type="text/javascript">
  var gaJsHost =
    "https:" == document.location.protocol ? "https://ssl." : "http://www.";
  document.write(
    unescape(
      "%3Cscript src='" +
        gaJsHost +
        "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"
    )
  );
</script>
<script type="text/javascript">
  try {
    var pageTracker = _gat._getTracker("UA-7375850-1");
    pageTracker._trackPageview();
  } catch (err) {}
</script>
<!-- AdSense async -->
<script>
  $("document").ready(function () {
    var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);
    $(".adsbygoogle").each(function () {
      adsbygoogle.push(this);
    });
  });
</script>
@endsection
