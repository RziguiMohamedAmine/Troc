@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
 
<section id="main" class="clearfix">
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
       
    </div>
    <div class="flex flex-col pl-32" style="width: 300px; padding-left: 8rem;">
    <a href="{{route('blogs.editfront',$blog->id)}}"> <button type="button" class="see-member" style="margin-bottom: 1rem;" data-goto="/profil/STE75-">
          <i class="lni-check-box marg-r-XS"></i><span>Update</span>
       </button></a>   
   </div>
   <div class="flex justify-end pl-32" style="width: 300px; padding-left: 8rem;">
   <a href="{{ route('blogs.destroyfront', $blog->id) }}" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this blog?')) document.getElementById('delete-blog-form').submit();"> 
         <button type="button" class="hover:bg-red-500" style="margin-bottom: 1rem;" data-goto="/profil/STE75-">
            <i class="lni-check-box marg-r-XS"></i><span>Delete</span>
         </button>
     </a>    
     <form id="delete-blog-form" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: none;">
       @csrf
       @method('DELETE')
   </form>
   </div>




  </div>
    @if ($blogs->isEmpty())
    <div class="member-box clearfix">
        <p>You haven't added any blogs yet.</p>
    </div>
    @endif 
    @endforeach
</section>
   



















{{-- <section id="user-blogs" class="clearfix">
    <h1>Your blogs</h1>

    @if ($blogs->isEmpty())
        <p>You haven't added any blogs yet.</p>
    @else
        <ul>
            @foreach ($blogs as $blog)
                <li>
                    <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->name }}</a>
                    <!-- Add other blog details here -->
                </li>
            @endforeach
        </ul>
    @endif
</section> --}}
@endsection