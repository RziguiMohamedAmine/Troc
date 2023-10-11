@extends('frontoffice.index')

@section('content')
<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
<section id="main" class="clearfix">
    <h1 id="profile-title">
     {{$product->user->name}} échange des services à Marmande - Lot et Garonne
    </h1>
    <p id="communaute-intro">
      Echange de service, 29 membres inscrits dans le département
      <strong>Lot et Garonne</strong>, en région
      <strong>Nouvelle-Aquitaine</strong>. Services de proximité et petites
      annonces gratuites d'échange de services et de biens à vendre ou à
      troquer.
      <a href="../user/register.html" title="">Créez votre profil</a>,
      <a href="../publier.html" title="">publiez des annonces</a> !
      <a
        href="../nouvelle-aquitaine/charente/membres.html"
        title=""
        class="region-link"
        >Charente</a
      >,Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id magnam quibusdam hic voluptates 
      voluptate distinctio aut voluptatum maxime quo, nam perferendis sit. Incidunt, 
      illum ea. Modi doloremque voluptatem error itaque?
      <a
        href="../nouvelle-aquitaine/charente-maritime.html"
        title=""
        class="region-link"
        >Charente Maritime</a
      >,
      <a
        href="../nouvelle-aquitaine/correze/membres.html"
        title=""
        class="region-link"
        >Corréze</a
      >,
      <a
        href="../nouvelle-aquitaine/creuse/membres.html"
        title=""
        class="region-link"
        >Creuse </a
      >,
      <a
        href="../nouvelle-aquitaine/dordogne/membres.html"
        title=""
        class="region-link"
        >Dordogne</a
      >,
      <a
        href="../nouvelle-aquitaine/gironde/membres.html"
        title=""
        class="region-link"
        >Gironde</a
      >,
      <a
        href="../nouvelle-aquitaine/landes/membres.html"
        title=""
        class="region-link"
        >Landes</a
      >,
      <a
        href="../nouvelle-aquitaine/lot-et-garonne/membres.html"
        title=""
        class="region-link"
        >Lot et Garonne</a
      >,
      <a
        href="../nouvelle-aquitaine/pyrenees-atlantiques/membres.html"
        title=""
        class="region-link"
        >Pyrénées-Atlantiques</a
      >,
      <a
        href="../nouvelle-aquitaine/deux-sevres/membres.html"
        title=""
        class="region-link"
        >Deux-Sèvres</a
      >,
      <a
        href="../nouvelle-aquitaine/vienne/membres.html"
        title=""
        class="region-link"
        >Vienne</a
      >,
      <a
        href="../nouvelle-aquitaine/haute-vienne/membres.html"
        title=""
        class="region-link"
        >Haute-Vienne</a
      >
    </p>

    <div id="content-container" style="margin-left: 4rem;">
      <div id="filters" class="clearfix">
        <a href="{{ route('products.index')}}">
        <button type="button" class="" data-goto="/normandie/seine-maritime">
          <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i
          ><span>Retour</span>
        </button>
        </a>
        <form
          id="filter-search"
          action="https://www.echange-service.com/communaute"
          method="post"
        >
          <input
            type="text"
            name="search"
            value=""
            id="search"
            placeholder="Rechercher dans ..."
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

      <!-- Profile -->
      <div id="profile-content" class="clearfix">
        <div id="profile-details" class="clearfix">
          <div id="profile-image">
            <span class="member-offline">&#9679;</span>
            <div class="img-container large blue">
              <img src="{{$product->user->profile_photo_url }}" alt="{{ $product->user->name }}"/>
            </div>
            <div class="offline"><span>Hors ligne</span></div>
          </div>
          <ul>
            <li>
              <i class="lni-user marg-r-XXS"></i>
              <span><strong>{{$product->user->name}}</strong></span>
            </li>
            <li class="small">
              <i class="lni-map-marker marg-r-XXS"></i><span>Marmande</span>
            </li>
            <li class="small">
              <i class="lni-alarm-clock marg-r-XXS"></i
              ><span>Inscrit le {{$product->user->created_at->format('Y-m-d')}}</span>
            </li>
            <li class="marg-t-S">
              <button
                type="button"
                class="highlight small"
                data-goto="/user/login"
                data-modal="Vous devez être authentifié pour contacter un membre.<br />Souhaitez-vous aller à la page de connexion ?"
              >
                <span>Contactez Moi !</span>
              </button>
            </li>
            <li class="marg-t-L addthis_toolbox addthis_default_style">
              <a class="addthis_button_preferred_1"></a>
              <a class="addthis_button_preferred_2"></a>
              <a class="addthis_button_preferred_3"></a>
              <a class="addthis_button_preferred_4"></a>
              <a class="addthis_button_compact"></a>
              <a class="addthis_counter addthis_bubble_style"></a>
              <script
                src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4eb1cca0207b297a"
                type="text/javascript"
              ></script>
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
                  <strong>Echange contre :</strong><span class="text-color1"> {{$product->exchange_for}} </span>, 
                  @else
                  <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span><strong class="font-bold"> DT</strong>
                  @endif
                </div>
                @else
                <div class="mt-4 mb-4">
                  <strong>Je cherche :</strong><span class="text-color1"> {{$product->name}} </span> <br><br>
                  @if ($product->exchange_for)
                  <strong>Echange contre :</strong><span class="text-color1"> {{$product->exchange_for}} </span>, 
                  @else
                  <strong>Prix :</strong><span class="text-color1"> {{$product->price}} </span>
                  @endif
                </div>
                @endif
                <div class="mt-4 mb-4 max-w-lg " >
                    <strong>Description : </strong> 
                    <p>{{$product->description}}</p>
                </div>
                <div class="mt-4 mb-4 flex justify-center items-center ">
                    @if ($product->exchange_for)
                    <button>Echange contre</button>, 
                    @else
                    <form action="{{ route('add.to.cart', ['productId' => $product->id]) }}" method="POST">
    @csrf
    <button type="submit">Ajouter au Panier</button>
</form>
                    @endif
                </div>
        </div>
       </div>

        
      </div>

      <!-- Ads -->
      <div id="profile-ads">
        <h4>Mes annonces</h4>
        <div class="ad-box text-center">Aucune annonce pour le moment</div>
      </div>

      <!-- Reviews -->

      <!-- AdSense -->
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
      <a href="{{ route('products.index')}}">
      <button type="button" class="marg-t" data-goto="/normandie/seine-maritime">
        <i class="lni-chevron-left small vertical-middle marg-r-XXS"></i><span>Retour</span>
      </button>
       </a>
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