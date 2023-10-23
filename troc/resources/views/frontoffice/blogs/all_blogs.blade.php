@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

<section id="main" class="clearfix">
   @foreach ($blogs as $blog)
    <div class="member-box clearfix">
      <span class="member-offline">&#9679;</span>
      <div class="member-image">
        <div class="img-container yellow cursor" data-goto="/profil/STE75-">
        <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->image }}" style="max-width: 100%; height: auto; margin: 0 auto; display: block;" />
        </div>
      </div>
      <div class="member-content clearfix">
        <div class="member-details">
          <a href="../../profil/STE75-.html" title="">
              <i class="lni-map-marker marg-r-XXS"></i>  
            <i class="lni-star-filled marg-r-XXS text-color2"></i>
            
          </a>
         <i class="lni-user marg-r-XXS"></i><span>{{$blog->user->name}}</span>
        </div>
       <div class="flex justify-end py-2 px-4">
        <a href="{{ route('blogs.show',['blog'=> $blog['id']]) }}">
          <button type="button" class="" data-goto="/profil/STE75-">
          <i class="lni-check-box marg-r-XS py-1"></i><span>Voir le Detail</span>
        </button>
        </a>
       </div>
      </div>
      <div class="member-services clearfix">
        <div>
         <span class="text-color1"> {{$blog->title}} </span> <br>
        </div>
        <div>
         <span class="text-color1"> {{$blog->content}} </span> <br>
        </div>
      </div>
    
    
    </div>
    @endforeach
</section>
@if ($blogs->isEmpty())
<div class="member-box clearfix">
    <p>Il n'y a actuellement aucun blog.</p>
</div>
@endif
@endsection
