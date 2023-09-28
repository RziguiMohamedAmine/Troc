@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
<section id="main" class="clearfix">
    @foreach ($products as $product)
    <div class="member-box clearfix">
      <span class="member-offline">&#9679;</span>
      <div class="member-image">
        <div class="img-container yellow cursor" data-goto="/profil/STE75-">
          @if ($product->user->profile_photo_url)
          <img src="{{$product->user->profile_photo_url }}" alt="{{ $product->user->name }}" />
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
         <i class="lni-user marg-r-XXS"></i><span>{{$product->user->name}}</span>
        </div>
       <div class="flex justify-end py-2 px-4">
        <a href="{{ route('products.show',['product'=> $product['id']]) }}">
          <button type="button" class="" data-goto="/profil/STE75-">
          <i class="lni-check-box marg-r-XS py-1"></i><span>Voir le Detail</span>
        </button>
        </a>
       </div>
      </div>
      <div class="member-services clearfix">
      
          @if ($product->is_offering)
        <div>         
          <strong>Je recherche : </strong><span class="text-color1">{{$product->name}}</span><br>
          @if ($product->exchange_for)
          <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>,<br>
          @else
          <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span><strong class="font-bold"> DT</strong>
          @endif
        </div>
        @else
        <div>
          <strong>Je propose : </strong><span class="text-color1"> {{$product->name}} </span> <br>
          @if ($product->exchange_for)
          <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>, <br>
          @else
          <strong>Prix : </strong><span class="text-color1"> {{$product->price}}</span><strong class="font-bold"> DT</strong>
          @endif
        </div>
        @endif
    </div>
    @endforeach
    <div class="flex flex-col pl-32" style="width: 300px; padding-left: 8rem;">
       <a href="/vrzv"> <button type="button" class="see-member" style="margin-bottom: 1rem;" data-goto="/profil/STE75-">
           <i class="lni-check-box marg-r-XS"></i><span>Update</span>
        </button></a>    
    </div>
    <div class="flex justify-end pl-32" style="width: 300px; padding-left: 8rem;">
       <a href="/vrzv"> <button type="button" class="hover:bg-red-500" style="margin-bottom: 1rem;" data-goto="/profil/STE75-">
           <i class="lni-check-box marg-r-XS"></i><span>Delete</span>
        </button></a>    
    </div>
  </div>
    @if ($products->isEmpty())
    <div class="member-box clearfix">
        <p>You haven't added any products yet.</p>
    </div>
    @endif
</section>




















{{-- <section id="user-products" class="clearfix">
    <h1>Your Products</h1>

    @if ($products->isEmpty())
        <p>You haven't added any products yet.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                    <!-- Add other product details here -->
                </li>
            @endforeach
        </ul>
    @endif
</section> --}}
@endsection