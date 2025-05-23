@extends('frontoffice.index')

@section('content')
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <section id="main" class="clearfix">
        <h1 id="profile-title">
            {{ $product->user->name }} échange des services
        </h1>
        <p id="communaute-intro">
            Echange de service, 29 membres inscrits dans le département
            <strong>Lot et Garonne</strong>, en région
            <strong>Nouvelle-Aquitaine</strong>. Services de proximité et petites
            annonces gratuites d'échange de services et de biens à vendre ou à
            troquer.
            <a href="../user/register.html" title="">Créez votre profil</a>,
            <a href="../publier.html" title="">publiez des annonces</a> !
            <a href="../nouvelle-aquitaine/charente/membres.html" title="" class="region-link">Charente</a>,Lorem
            ipsum dolor, sit amet consectetur adipisicing elit. Id magnam quibusdam hic voluptates
            voluptate distinctio aut voluptatum maxime quo, nam perferendis sit. Incidunt,
            illum ea. Modi doloremque voluptatem error itaque?
            <a href="../nouvelle-aquitaine/charente-maritime.html" title="" class="region-link">Charente Maritime</a>,
            <a href="../nouvelle-aquitaine/correze/membres.html" title="" class="region-link">Corréze</a>,
            <a href="../nouvelle-aquitaine/creuse/membres.html" title="" class="region-link">Creuse </a>,
            <a href="../nouvelle-aquitaine/dordogne/membres.html" title="" class="region-link">Dordogne</a>,
            <a href="../nouvelle-aquitaine/gironde/membres.html" title="" class="region-link">Gironde</a>,
            <a href="../nouvelle-aquitaine/landes/membres.html" title="" class="region-link">Landes</a>,
            <a href="../nouvelle-aquitaine/lot-et-garonne/membres.html" title="" class="region-link">Lot et
                Garonne</a>,
            <a href="../nouvelle-aquitaine/pyrenees-atlantiques/membres.html" title=""
                class="region-link">Pyrénées-Atlantiques</a>,
            <a href="../nouvelle-aquitaine/deux-sevres/membres.html" title="" class="region-link">Deux-Sèvres</a>,
            <a href="../nouvelle-aquitaine/vienne/membres.html" title="" class="region-link">Vienne</a>,
            <a href="../nouvelle-aquitaine/haute-vienne/membres.html" title="" class="region-link">Haute-Vienne</a>
        </p>

        <div id="content-container" style="margin-left: 4rem;">
            <div id="filters" class="clearfix">
                <a href="{{ route('products.index') }}">
                    <button type="button" class="" data-goto="/normandie/seine-maritime">
                        <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i><span>Retour</span>
                    </button>
                </a>

            </div>

        </div>
        <ul>
           <br>
           <br>


            <li class="marg-t-L addthis_toolbox addthis_default_style">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
                <script src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4eb1cca0207b297a" type="text/javascript"></script>
            </li>
        </ul>
        </div>

        <!-- Profile -->
        <div id="profile-content" class="clearfix">
            <div id="profile-details" class="clearfix">
                <div id="profile-image">
                    <span class="member-offline">&#9679;</span>
                    <div class="img-container large blue">
                        <img src="{{ $product->user->profile_photo_url }}" alt="{{ $product->user->name }}" />
                    </div>
                    <div class="offline"><span>Hors ligne</span></div>
                </div>
                <ul>
                    <li>
                        <i class="lni-user marg-r-XXS"></i>
                        <span><strong>{{ $product->user->name }}</strong></span>
                    </li>
                    <li class="small">
                        <i class="lni-map-marker marg-r-XXS"></i><span>Marmande</span>
                    </li>
                    <li class="small">
                        <i class="lni-alarm-clock marg-r-XXS"></i><span>Inscrit le
                            {{ $product->user->created_at->format('Y-m-d') }}</span>
                    </li>
                    @if ($product->user->id !== Auth::id())
                    <li class="marg-t-S">
                        <form id="conversationForm" method="POST" action="{{ route('check-conversation') }}">
                            @csrf <!-- Add this line to include the CSRF token -->
                            <input type="hidden" id="receiverId" name="receiverId" value="{{$product->user->id}}">
                            <button type="submit" class="highlight small">
                                <span class="text-white">Contactez Moi !</span>
                            </button>
                        </form>
                    </li>
                @else
                @endif
                    <li class="marg-t-L addthis_toolbox addthis_default_style">
                        <a class="addthis_button_preferred_1"></a>
                        <a class="addthis_button_preferred_2"></a>
                        <a class="addthis_button_preferred_3"></a>
                        <a class="addthis_button_preferred_4"></a>
                        <a class="addthis_button_compact"></a>
                        <a class="addthis_counter addthis_bubble_style"></a>
                        <script src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4eb1cca0207b297a" type="text/javascript"></script>
                    </li>
                </ul>
            </div>

            <div id="profile-provide" class=" flex flex-col justify-center items-center py-8">
                <div class="mt-4 mb-4 ml-32 " >
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" class="w-40 border border-gray-950 rounded-lg" />
                </div>

                <div>
                    @if ($product->is_offering)
                    <div class="mt-4 mb-4">
                      <strong>Je propose : </strong><span class="text-color1"> {{$product->name}}</span><br><br>
                      @if ($product->exchange_for)
                      <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>,
                      @else
                      <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span><strong class="font-bold"> DT</strong>
                      @endif
                    </div>
                    @else
                    <div class="mt-4 mb-4">
                      <strong>Je cherche : </strong> <span class="text-color1"> {{$product->name}} </span> <br><br>
                      @if ($product->exchange_for)
                      <strong>Echange contre :</strong><span class="text-color1"> {{$product->exchange_for}} </span>,
                      @else
                      <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span><br>
                      @endif
                      @if ($product->start_date && $product->end_date)
                      <br>
                      <strong>Date de Debut : </strong><span class="text-color1"> {{ $product->start_date }} </span><br>
                      <strong>Date de fin : </strong><span class="text-color1"> {{ $product->end_date }} </span>
                      @endif
                    </div>
                    @endif
                    <div class="mt-4 mb-4 max-w-lg " >
                        <strong>Description : </strong>
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="mt-4 mb-4 flex justify-center items-center ">
                        @if ($product->exchange_for)
                        @if ($product->user->id !== Auth::id() && $product->is_offering)
                        <a href="{{ route('offres.create', ['product' => $product['id']]) }}">
                            @csrf
                            <button>Echange contre</button>
                        </a>
                        @endif
                        @else
                        @if ($product->user->id !== Auth::id() && $product->is_offering)
                        <form action="{{ route('add.to.cart', ['productId' => $product->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Ajouter au Panier</button>
                        </form>
                        @endif
                        @endif
                        <form method="GET" action="{{ route('claims.create', ['product_id' => $product->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary ml-1">Reclamation</button>
                        </form>
                    </div>
            </div></div>


        </div>
        <!-- Ads -->
        @if($offres->count() > 0)
        <div id="profile-ads " style="margin-top:16px">
            <h4 class="text-center">Les offres</h4>
            <div class="ad-box">

                @foreach ($offres as $offre)
                    <div class="flex h-16 justify-between w-full items-center overflow-hidden">
                        <img class="rounded-full h-full w-16" src="{{  $offre->user->profile_photo_url }}" />
                        <span>
                            {{ $offre->value }}
                        </span>
                        <span>
                            {{ $offre->description }}
                        </span>
                        <img class="h-full w-16" src="{{ asset('images/' . $offre->image) }}" />
                        <div class="flex gap-4 items-center">

                            <form id="offres-form-accept"  method="GET" action="{{ route('offres.acceptfront',['id' => $offre->product_id]) }}">
                                @csrf
                                <button onclick="event.preventDefault(); if (confirm('Etes-vous sûr de vouloir accepter cette offre ?')) document.getElementById('offres-form-accept').submit();" type="submit" class="btn btn-primary ml-1">Accepter</button>
                            </form>
                            <form id="offres-form"  method="GET" action="{{ route('offres.destroyfront',['id' => $offre->id]) }}">
                                @csrf
                                <button onclick="event.preventDefault(); if (confirm('Etes-vous sûr de vouloir refuser cette offre ?')) document.getElementById('offres-form').submit();" type="submit" class="btn btn-primary ml-1">Refuser</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <div id="profile-ads">
            <h4>Mes annonces</h4>
            <div class="ad-box text-center">Aucune annonce pour le moment</div>
        </div>

        <!-- Reviews -->

        <!-- AdSense -->
        <ins class="adsbygoogle" style="display: block; width: 100%; margin: 20px 0 30px 0" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-0184352842429596" data-ad-slot="6520630379"></ins>
        <!--<script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>-->
        <a href="{{ route('products.index') }}">
            <button type="button" class="marg-t" data-goto="/normandie/seine-maritime">
                <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i><span>Retour</span>
            </button>
        </a>



    </section>




    <script type="text/javascript" src="{{ asset('assets/frontoffice/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontoffice/css/generate/ES.EchangeService.1.css.css') }}" />
    <script type="text/javascript" src="{{ asset('assets/frontoffice/js/generate/ES.EchangeService.1.js.php') }}"></script>
    <link href="../../../cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet" />
    <script src="{{ asset('assets/frontoffice/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontoffice/js/ponyfill/ponyfill.js') }}"></script>




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
        $("document").ready(function() {
            var adsbygoogle = (adsbygoogle = window.adsbygoogle || []);
            $(".adsbygoogle").each(function() {
                adsbygoogle.push(this);
            });
        });
    </script>
@endsection
