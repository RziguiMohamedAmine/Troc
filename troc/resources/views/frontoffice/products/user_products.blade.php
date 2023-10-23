@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 



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
          <strong>Je propose : </strong><span class="text-color1">{{$product->name}}</span><br>
          @if ($product->exchange_for)
          <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>,<br>
          @else
          <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span><strong class="font-bold"> DT</strong>
          @endif
        </div>
        @else
        <div>
          <strong>Je cherche : </strong><span class="text-color1"> {{$product->name}} </span> <br>
          @if ($product->exchange_for)
          <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>, <br>
          @else
          <strong>Prix : </strong><span class="text-color1"> {{$product->price}}</span><strong class="font-bold"> DT</strong>
          @endif
        </div>
        @endif
    </div>
    <div class="flex flex-col pl-32" style="width: 300px; padding-left: 8rem;">
      <a href="{{route('products.edit',$product->id)}}"> <button type="button" class="see-member" style="margin-bottom: 1rem;" data-goto="/profil/STE75-">
          <i class="lni-pencil marg-r-XS"></i><span>Update</span>
       </button></a>    
   </div>
   <div class="flex justify-end pl-32" style="width: 300px; padding-left: 8rem;">
     
    
    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
      @csrf
      <input name="_method" type="hidden" value="DELETE">
      <button type="submit" class="hover:bg-red-500 confirm-button" style="margin-bottom: 1rem;" data-goto="/profil/STE75-"><i class="lni lni-trash lni-16 marg-r-XS"></i><span>Delete</span></button>
  </form>
    

   </div>




  </div>
    @if ($products->isEmpty())
    <div class="member-box clearfix">
        <h1>You haven't added any products yet.</h1>
    </div>
    @endif 
    @endforeach
</section>
   
















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

  $('.confirm-button').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Are you sure you want to delete this product?`,
          text: "It will gone forever",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
          .then((willDelete) => {
              if (willDelete) {
                  form.submit();
              }
          });
  });

</script>

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