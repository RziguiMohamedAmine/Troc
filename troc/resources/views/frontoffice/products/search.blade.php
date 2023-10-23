@extends('frontoffice.index')

@section('content')


<section id="main" class="clearfix">
  <div>
    @if(auth()->check() && !request()->routeIs('profile.show'))
<div id="box-headersearch" class="box clearfix" data-box="ES header HeaderSearch" >
  <form action="{{ route('search') }}" method="post" class="clearfix">
    @csrf
    <div class="select-group">
      <i class="lni-share marg-r-XXS"></i>
      <select name="search_region" id="search-region" required="required">
        <option value="1" >Je propose</option>
        <option value="0" >Je recherche</option>
    </select>
    </div>
    <div class="select-group">
      <i class="lni-revenue marg-r-XXS"></i>
      <select name="search_department" id="search-department" required="required">
        <option value="service" >Un service</option>
        <option value="product" >Un bien</option>
    </select>
    </div>
    <div class="select-group">
      <i class="lni-menu marg-r-XXS"></i>
      <select name="product-subcategory_id">
        @foreach ($categories as $category)
        <option value="" selected="selected">Catégories</option>
        <option disabled class="bold bg-light large">{{ $category->name }}</option>
                  @foreach ($category->subcategories as $subcategory)
                     <option value="{{ $subcategory->id }} @if(old('subcategory_id') == $subcategory->id ) selected @endif" >{{ $subcategory->name }}</option>
                   @endforeach
        @endforeach
      </select>
    </div>
    <button class="highlight" name="form_search_dispatcher">
      <i class="lni-search"></i><span>RECHERCHER</span>
    </button>
  </form>
</div>
@else

@endif
  </div>
    <h1>Les membres - Bricolage, Electricité</h1>
    <p id="communaute-intro">
      Echange de service, 929 membres inscrits en <strong>France</strong>.
      Services de proximité et petites annonces gratuites d'échange de
      services et de biens à vendre ou à troquer.
      <a href="../../user/register.html" title="">Créez votre profil</a>,
      <a href="../../publier.html" title="">publiez des annonces</a> !
    </p>

    <div id="services-menu">
      <h5>Catégories</h5>
      <div id="services-menu-container">
        <a href="{{ route('products.index') }}" class="{{ request()->is('products') ? 'active' : ''}}">
            <i class="active"></i>
            <span>Tous les produits</span>
            <span class="count {{ request()->is('products') ? 'active' : ''}}">
                ({{ $productCount->count() }})
            </span>
        </a>
        <ul>
            @foreach ($categories as $category)
          <li>
            <a href="{{ route('products.index', ['category' => $category->id]) }}" class="{{ $category->id == $selectedCategory ? 'active' : '' }}">
              <i class="{{ $category->icon }}"></i>
              <span>{{ $category->name }}</span>
              <span class="count {{ $category->id == $selectedCategory ? 'active' : '' }}">
              ({{ $category->subcategories->sum(function ($subcategory) {
                return $subcategory->products->count();
              })}})
            </span>
            </a>

            <ul class="">
                @foreach ($category->subcategories as $subcategory)
              <li>
                <a class="{{ $subcategory->id == $selectedSubcategory ? 'active' : '' }}" href="{{ route('products.index', ['subcategory' => $subcategory->id]) }}">{{ $subcategory->name }}</a>
                <span class="count {{ $subcategory->id == $selectedSubcategory ? 'active' : '' }}">{{$subcategory->products->count()}}</span>
              </li>
              @endforeach
            </ul>
          </li>
        @endforeach
        </ul>
      </div>

      <div id="mobile-select-menu" class="select-container">
        <select name="mobile_select_menu" data-goto="true">
          <option value="/communaute">Toutes les catégories</option>
          <option value="/aide-a-la-personne" class="bold large">
            Aide à la personne
          </option>
          <option value="/aide-a-la-personne/co-voiturage">
            - Co-Voiturage
          </option>
          <option value="/aide-a-la-personne/courses">- Courses</option>
          <option value="/aide-a-la-personne/demarches-administratives">
            - Démarches admin.
          </option>
          <option value="/aide-a-la-personne/depannage-informatique">
            - Dépannage Informatique
          </option>
          <option value="/aide-a-la-personne/garde-d-enfants">
            - Garde d'enfants
          </option>
          <option value="/aide-a-la-personne/lecture">- Lecture</option>
          <option value="/aide-a-la-personne/menage">- Ménage</option>
          <option value="/aide-a-la-personne/preparation-repas">
            - Préparation Repas
          </option>
          <option value="/aide-a-la-personne/promenade-d-animaux">
            - Promenade d'animaux
          </option>
          <option value="/aide-a-la-personne/repassage">- Repassage</option>
          <option value="/aide-a-la-personne/autres">- Autres</option>
          <option value="/beaute-bien-etre" class="bold large">
            Beauté Bien-être
          </option>
          <option value="/beaute-bien-etre/coaching-sportif">
            - Coaching
          </option>
          <option value="/beaute-bien-etre/coiffure">- Coiffure</option>
          <option value="/beaute-bien-etre/manucure">- Manucure</option>
          <option value="/beaute-bien-etre/maquillage">- Maquillage</option>
          <option value="/beaute-bien-etre/massage">- Massage</option>
          <option value="/beaute-bien-etre/relooking">- Relooking</option>
          <option value="/beaute-bien-etre/yoga">- Yoga</option>
          <option value="/beaute-bien-etre/autres">- Autres</option>
          <option value="/bricolage" class="bold large" selected="selected">
            Bricolage
          </option>
          <option value="/bricolage/electricite" selected="selected">
            - Electricité
          </option>
          <option value="/bricolage/electronique">- Electronique</option>
          <option value="/bricolage/maconnerie">- Maçonnerie</option>
          <option value="/bricolage/menuiserie">- Menuiserie</option>
          <option value="/bricolage/outillage">- Outillage</option>
          <option value="/bricolage/peinture">- Peinture</option>
          <option value="/bricolage/plomberie">- Plomberie</option>
          <option value="/bricolage/tapisserie">- Tapisserie</option>
          <option value="/bricolage/autres">- Autres</option>
          <option value="/cours" class="bold large">Cours</option>
          <option value="/cours/cuisine">- Cuisine</option>
          <option value="/cours/danse">- Danse</option>
          <option value="/cours/dessin-peinture-sculpture">
            - Dessin, peinture, sculpture
          </option>
          <option value="/cours/francais">- Français</option>
          <option value="/cours/informatique">- Informatique</option>
          <option value="/cours/langues-etrangeres">
            - Langues étrangères
          </option>
          <option value="/cours/maths">- Maths</option>
          <option value="/cours/musique">- Musique</option>
          <option value="/cours/photo">- Photo</option>
          <option value="/cours/soutien-scolaire">- Soutien scolaire</option>
          <option value="/cours/autres">- Autres</option>
          <option value="/loisirs" class="bold large">Loisirs</option>
          <option value="/loisirs/blue-ray-dvd-cd">
            - Blu-ray, DVD et CD
          </option>
          <option value="/loisirs/couture">- Couture</option>
          <option value="/loisirs/instruments-de-musique">
            - Instruments de musique
          </option>
          <option value="/loisirs/jeux-et-jouets">- Jeux & jouets</option>
          <option value="/loisirs/livres">- Livres</option>
          <option value="/loisirs/sport-hobbies">- Sport & Hobbies</option>
          <option value="/loisirs/vins-et-gastronomie">
            - Vins & Gastronomie
          </option>
          <option value="/loisirs/autres">- Autres</option>
          <option value="/maison" class="bold large">Maison</option>
          <option value="/maison/ameublement">- Ameublement</option>
          <option value="/maison/colocation">- Colocation</option>
          <option value="/maison/decoration">- Décorarion</option>
          <option value="/maison/domotique">- Domotique</option>
          <option value="/maison/echange">- Echange</option>
          <option value="/maison/gardiennage">- Gardiennage</option>
          <option value="/maison/jardinage">- Jardinage</option>
          <option value="/maison/location">- Location</option>
          <option value="/maison/vente">- Vente</option>
          <option value="/maison/autres">- Autres</option>
          <option value="/mode" class="bold large">Mode</option>
          <option value="/mode/accessoires-et-bagagerie">
            - Accessoires & Bagagerie
          </option>
          <option value="/mode/bebe-enfant">- Bébé & Enfant</option>
          <option value="/mode/chaussures">- Chaussures</option>
          <option value="/mode/montres-et-bijoux">- Montres & Bijoux</option>
          <option value="/mode/vetements">- Vêtements</option>
          <option value="/mode/autres">- Autres</option>
          <option value="/travail" class="bold large">Travail</option>
          <option value="/travail/archivage">- Archivage</option>
          <option value="/travail/assistance">- Assistance</option>
          <option value="/travail/bureau">- Bureau</option>
          <option value="/travail/comptabilite">- Comptabilité</option>
          <option value="/travail/documentation">- Documentation</option>
          <option value="/travail/proposition-emploi">
            - Proposition d'emploi
          </option>
          <option value="/travail/recherche-emploi">
            - Recherche d'emploi
          </option>
          <option value="/travail/redaction">- Rédaction</option>
          <option value="/travail/secretariat">- Secrétariat</option>
          <option value="/travail/traduction">- Traduction</option>
          <option value="/travail/autres">- Autres</option>
          <option value="/vacances" class="bold large">Vacances</option>
          <option value="/vacances/campings">- Campings</option>
          <option value="/vacances/chambres-hotes">- Chambres d'hôtes</option>
          <option value="/vacances/hebergements-insolites">
            - Hébergements insolites
          </option>
          <option value="/vacances/hotels">- Hôtels</option>
          <option value="/vacances/locations-et-gites">
            - Location & Gîtes
          </option>
          <option value="/vacances/autres">- Autres</option>
          <option value="/vehicules" class="bold large">Véhicules</option>
          <option value="/vehicules/echange">- Echange</option>
          <option value="/vehicules/entretien">- Entretien</option>
          <option value="/vehicules/grosses-reparations">
            - Grosses Réparations
          </option>
          <option value="/vehicules/installation">- Installation</option>
          <option value="/vehicules/location">- Location</option>
          <option value="/vehicules/nettoyage">- Nettoyage</option>
          <option value="/vehicules/petites-reparations">
            - Petites Réparations
          </option>
          <option value="/vehicules/vente">- Vente</option>
          <option value="/vehicules/autres">- Autres</option>
        </select>
      </div>

      <div id="star-ads" class="marg-t-L">
        <h4>
          <i class="lni-star-filled text-color2 marg-r-XXS"></i>Annonces à la
          une
        </h4>
        <div class="text-center marg-t">
          <div
            class="image-container cursor opacity-hover-80"
            data-goto="/annonce/4906"
          >
            <img
              src="{{asset('assets/frontoffice/img/upload/services/bricolage.jpg')}}"
              class="width-100"
              alt="Plomberie - Paris"
            />
          </div>
          <a href="../../index.html" class="bold" title="">Plomberie</a>
          <div><i class="lni-map-marker marg-r-XXS"></i>Paris</div>
        </div>
        <div class="text-center marg-t">
          <div
            class="image-container cursor opacity-hover-80"
            data-goto="/annonce/4916"
          >
            <img
              src="{{asset('assets/frontoffice/img/upload/services/beaute-bien-etre.jpg')}}"
              class="width-100"
              alt="Soutien moral et physique - Paris"
            />
          </div>
          <a href="../../index.html" class="bold" title=""
            >Soutien moral et physique</a
          >
          <div><i class="lni-map-marker marg-r-XXS"></i>Paris</div>
        </div>
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
      @foreach ($results as $product)
                                    @php
                                             $today = \Carbon\Carbon::today();
                                             $endDate = \Carbon\Carbon::parse($product->end_date);
                                    @endphp
                                    @if ($endDate->greaterThanOrEqualTo($today))
      <div class="member-box clearfix" id="productDiv" data-product-id="{{ $product->id }}">
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
          <a href="{{ route('products.show',['product'=> $product['id']]) }}" class="flex justify-end py-2 px-4 rounded-2xl" >
            <i class="lni-check-box marg-r-XS py-1"></i><span>Voir le Detail</span>
          </a>
        </div>
        <div class="member-services clearfix">

            @if (!$product->is_offering)
          <div>
            <strong>Je cherche :</strong><span class="text-color1">{{$product->name}}</span><br>
          @if ($product->start_date && $product->end_date)
              @if ($product->exchange_for)
                <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span> <br>
                <strong>Service entre : </strong><span class="text-color1"> {{$product->start_date}} et {{$product->end_date}} </span> <br>
              @else
                <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span> </span><strong class="font-bold"> DT</strong><br>
                <strong>Service entre : </strong><span class="text-color1"> {{$product->start_date}} </span><strong > et </strong><span class="text-color1"> {{$product->end_date}} </span>
              @endif
                @else
            @if ($product->exchange_for)
                <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span> <br>
              @else
                <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span> </span><strong class="font-bold"> DT</strong>
           @endif

           @endif
          </div>
          @else
          <div>
            <strong>Je propose : </strong><span class="text-color1"> {{$product->name}} </span> <br>
            @if ($product->exchange_for)
            <strong>Echange contre : </strong><span class="text-color1"> {{$product->exchange_for}} </span>, <br>
            @else
            <strong>Prix : </strong><span class="text-color1"> {{$product->price}} </span> </span><strong class="font-bold"> DT</strong>
            @endif
          </div>
          @endif
        </div>
      </div>
       @endif
      @endforeach

      @if ($results->isEmpty())
      <p>No products found for this subcategory.</p>
      @endif
      <!-- No members -->

      <!-- AdSense -->
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


  <script>
document.addEventListener("DOMContentLoaded", function() {
    var productDiv = document.getElementById("productDiv");

    productDiv.addEventListener("click", function() {
        var productId = productDiv.getAttribute("data-product-id");
        var userId = "{{ auth()->user()->id ?? null }}";

        console.log("Product ID: " + productId);
        console.log("User ID: " + userId);

        if (userId && productId) {
          fetch(`/add-to-history/${userId}/${productId}`, {
    method: "POST", // Change the method to POST
    headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        "Content-Type": "application/json", // Set the content type if needed
    },
    body: JSON.stringify({}), // Include an empty body or data if necessary
})
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Product added to history!");
                } else {
                    console.log("Failed to add product to history.");
                }
            })
            .catch(error => {
                console.error(error);
            });
        }

        window.location.href = "/products/" + productId;
    });
});
</script>


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
