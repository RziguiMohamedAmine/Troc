@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

<section id="main" class="clearfix">
    <!-- Product 1 -->
    <div class="member-box clearfix">
        <span class="member-offline">&#9679;</span>
        <div class="member-image">
            <div class="img-container yellow cursor" data-goto="/profil/STE75-">
                <img src="{{ asset('assets/frontoffice/img/EchangeService/avatar_f.png') }}" alt="Default User Photo" class="user-photo">
            </div>
        </div>
        <div class="member-content clearfix">
            <div class="member-details">
                <a href="../../profil/STE75-.html" title="">
                    <i class="lni-map-marker marg-r-XXS"></i>
                    <i class="lni-star-filled marg-r-XXS text-color2"></i>
                    <span>STE75-</span>
                </a>
                <i class="lni-user marg-r-XXS"></i><span>Hachem</span>
            </div>
            <div class="flex justify-end py-2 px-4">
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_name" value="Mannette">
                    <input type="hidden" name="product_price" value="150">
                    <button type="submit" class="">
                        <i class="lni-check-box marg-r-XS py-1"></i><span>Ajouter au panier</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="member-services clearfix">
            <div>
                <strong>Je propose : </strong><span class="text-color1">Mannette</span><br>
                <strong>Prix : </strong><span class="text-color1"> 150 </span><strong class="font-bold"> DT</strong>
            </div>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="member-box clearfix">
        <span class="member-offline">&#9679;</span>
        <div class="member-image">
            <div class="img-container yellow cursor" data-goto="/profil/STE75-">
                <img src="{{ asset('assets/frontoffice/img/EchangeService/avatar_f.png') }}" alt="Default User Photo" class="user-photo">
            </div>
        </div>
        <div class="member-content clearfix">
            <div class="member-details">
                <a href="../../profil/STE75-.html" title="">
                    <i class="lni-map-marker marg-r-XXS"></i>
                    <i class="lni-star-filled marg-r-XXS text-color2"></i>
                    <span>STE75-</span>
                </a>
                <i class="lni-user marg-r-XXS"></i><span>Hachem</span>
            </div>
            <div class="flex justify-end py-2 px-4">
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_name" value="Pc">
                    <input type="hidden" name="product_price" value="300">
                    <button type="submit" class="">
                        <i class="lni-check-box marg-r-XS py-1"></i><span>Ajouter au panier</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="member-services clearfix">
            <div>
                <strong>Je propose : </strong><span class="text-color1">Pc</span><br>
                <strong>Prix : </strong><span class="text-color1"> 300 </span><strong class="font-bold"> DT</strong>
            </div>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="member-box clearfix">
        <span class="member-offline">&#9679;</span>
        <div class="member-image">
            <div class="img-container yellow cursor" data-goto="/profil/STE75-">
                <img src="{{ asset('assets/frontoffice/img/EchangeService/avatar_f.png') }}" alt="Default User Photo" class="user-photo">
            </div>
        </div>
        <div class="member-content clearfix">
            <div class="member-details">
                <a href="../../profil/STE75-.html" title="">
                    <i class="lni-map-marker marg-r-XXS"></i>
                    <i class="lni-star-filled marg-r-XXS text-color2"></i>
                    <span>STE75-</span>
                </a>
                <i class="lni-user marg-r-XXS"></i><span>Hachem</span>
            </div>
            <div class="flex justify-end py-2 px-4">
                <form method="POST" action="{{ route('cart.add') }}">
                    @csrf
                    <input type="hidden" name="product_name" value="Playstation">
                    <input type="hidden" name="product_price" value="200">
                    <button type="submit" class="">
                        <i class="lni-check-box marg-r-XS py-1"></i><span>Ajouter au panier</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="member-services clearfix">
            <div>
                <strong>Je propose : </strong><span class="text-color1">Playstation</span><br>
                <strong>Prix : </strong><span class="text-color1"> 200 </span><strong class="font-bold"> DT</strong>
            </div>
        </div>
    </div>
</section>
@endsection
