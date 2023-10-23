{{-- <h1>Hi Simple User</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf <!-- This adds a CSRF token to protect against Cross-Site Request Forgery -->
        <button type="submit" class="dropdown-item text-danger">
            <i class="mdi mdi-power text-danger"></i> Logout
        </button>
    </form> --}}

    <!DOCTYPE html>
    <html lang="fr">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <!-- /Added by HTTrack -->
      <head>
        <title>
          Echange Service - Annonces gratuites, échange de services et troc
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="fr-FR" />
        <meta
          name="description"
          content="Echange de services gratuits - Petites annonces gratuites et troc dans votre département, entraide et services gratuits entre particuliers"
        />
        <meta name="robots" content="index, follow, archive" />
        <meta property="og:image" content="{{asset('assets/frontoffice/img/EchangeService/image-couv.png')}}"/>
        <style>
          html {
            background-color: #e3e3e3;
          }
          body {
            display: none;
          }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/frontoffice/css/generate/Home.EchangeService.1.css.css')}}"/>
        <link href="{{asset('assets/frontoffice/owlcarousel/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/frontoffice/owlcarousel/owl.theme.default.min.css')}}" rel="stylesheet"/>
        <script async src="{{asset('assets/frontoffice/pagead/js/f.txt')}}"></script>
        <!--<script>(adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-0184352842429596", enable_page_level_ads: true });</script>-->
        <script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"></script>
      </head>

      <section id="top">
        <div class="container-center clearfix">
          <div id="box-headerlogo" class="box clearfix" data-box="CMS top HeaderLogo">
            <a href="{{ route('home') }}" title="">
              <img src="{{asset('assets/frontoffice/img/logo_es.png')}}" alt="Echange & Service - " />
            </a>
          </div>
          <div id="box-menubox" class="box clearfix" data-box="CMS top MenuBox">
            <span
              class=""
              id="mobile-menu"
              data-event="click"
              data-toggle-classes="block"
              data-toggle-classes-target="#nav-menu"
              ><i class="lni-menu"></i
            ></span>
            <ul id="nav-menu" class="links">
              <li>
                @if(!auth()->check())
                 <a href="{{ route('welcome') }}" title="" class="link"><i class="lni-users"></i>Accueil</a>
                @else
                <a href="{{ route('home') }}" title="" class="link"><i class="lni-users"></i>Accueil</a>
                @endif

              </li>
              <li>
                @if(auth()->check())
                <a href="{{ route('history.index') }}"title="" class="link"
                  ><i class="lni-question-circle"></i>History</a
                ></a>@endif
              </li>
              <li>
                @if(auth()->check())
                <a href="{{ route('history.index') }}"title="" class="link"
                  ><i class="lni-question-circle"></i>History</a
                ></a>@endif
              </li>
              {{-- <li>
                <a href="communaute.html" title="" class="link"
                  ><i class="lni-users"></i>CHAT</a
                >
              </li> --}}
              <li>
                <a href="faq.html" title="" class="link"
                  ><i class="lni-question-circle"></i>FAQ</a
                >
              </li>
              <li>
                <a href="contact.html" title="" class="link"
                  ><i class="lni-envelope"></i>CONTACT</a
                >
              </li>
              @if(!auth()->check())
              <li>
                <a href="{{ route('register') }}" title="" class="link"
                  ><i class="lni-user marg-r-XS" style="display: inline-block"></i
                  >INSCRIPTION GRATUITE</a
                >
              </li>
              @else
                     <!--Not Connected-->
              @endif
              <li>
                <a href="{{ route('user.products') }}" title="" class="link"
                  ><i class="lni-question-circle"></i>Mes Annonces</a
                >
              </li>
              <li>
                @if(auth()->check())
                <a href="{{ route('profile.show') }}" id="" title="" class="button"><i class="lni-lock"></i><span>Mon compte</span></a>
                @else
                     <!--Not Connected-->
                @endif
              </li>
              <li>
                <a href="{{ route('products.create') }}" title="" class="button highlight">
                  <i class="lni-pencil-alt"></i><span>Publier une annonce</span>
                </a>
              </li>

              <li>
                @can('admin', Auth::user())
                <a href="{{ route('dashboard') }}" id="" title="" class="button"><i class="lni-dashboard"></i><span>dashboard</span></a>
               @endcan
              </li>
              <li>
                @if(auth()->check())
                <!-- User is logged in, show the "logout" button -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                      <button type="submit">
                          <i class="lni-power-switch"></i> Logout
                      </button>
                  </form>
                 @else
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                      <button type="submit">
                          <a href="{{ route('login') }}"><i class="lni-user marg-r-XS"></i>Login</a>
                      </button>
                </form>
                 @endif
              </li>
              <li>
                @if(auth()->check())
                <a href="{{ route('show.cart') }}" title="" class="button highlight">
                  <i class="lni-cart"></i><span>Mon panier</span>
                </a>
                @else
                <!--Not Connected-->
                @endif

              </li>
            </ul>
          </div>
        </div>
      </section>
      <header class="clearfix home">
        <div class="container-center clearfix">
          <div class="clear"></div>


          {{-- @if(!auth()->check()) --}}
          <div id="es-home-header-title">
            <h1>
              <span class="text-color1">ECHANGE</span> &
              <span class="text-color2">SERVICE</span> - 6726 MEMBRES
            </h1>
            <p>
              Echange Service est une plate-forme de mise en relation qui vise à
              favoriser l'échange et le service. Publiez des annonces !<br />
              Vendre, acheter, échanger vos biens et vos services sans commission
              avec les membres de la communauté !
            </p>
          </div>



         @if(auth()->check())
          <div id="box-headersearch" class="box clearfix" data-box="ES header HeaderSearch" >
            <form action="https://www.echange-service.com/search/dispatcher" method="post" class="clearfix">
              <div class="select-group">
                <i class="lni-map-marker marg-r-XXS"></i>
                <select name="search_region" id="search-region">
                  <option value="" class="bold">Toute la France / Régions</option>
                  <option value="auvergne-rhone-alpes" data-region="1">
                    Auvergne-Rhône-Alpes
                  </option>
                  <option value="bourgogne-franche-comte" data-region="2">
                    Bourgogne-Franche-Comté
                  </option>
                  <option value="bretagne" data-region="3">Bretagne</option>
                  <option value="centre-val-de-loire" data-region="4">
                    Centre-Val de Loire
                  </option>
                  <option value="corse" data-region="5">Corse</option>
                  <option value="grand-est" data-region="6">Grand Est</option>
                  <option value="guadeloupe" data-region="14">Guadeloupe</option>
                  <option value="guyane" data-region="15">Guyane</option>
                  <option value="hauts-de-france" data-region="7">
                    Hauts-de-France
                  </option>
                  <option value="ile-de-france" data-region="8">
                    Île-de-France
                  </option>
                  <option value="martinique" data-region="16">Martinique</option>
                  <option value="mayotte" data-region="18">Mayotte</option>
                  <option value="normandie" data-region="9">Normandie</option>
                  <option value="nouvelle-aquitaine" data-region="10">
                    Nouvelle-Aquitaine
                  </option>
                  <option value="occitanie" data-region="11">Occitanie</option>
                  <option value="pays-de-la-loire" data-region="12">
                    Pays de la Loire
                  </option>
                  <option value="provence-alpes-cote-d-azur" data-region="13">
                    Provence-Alpes-Côte d'Azur
                  </option>
                  <option value="reunion" data-region="17">Réunion</option>
                </select>
              </div>
              <div class="select-group">
                <i class="lni-map-marker marg-r-XXS"></i>
                <select name="search_department" id="search-department">
                  <option value="" selected="selected">Départements</option>
                  <option
                    value="auvergne-rhone-alpes/ain"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Ain
                  </option>
                  <option
                    value="hauts-de-france/aisne"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Aisne
                  </option>
                  <option
                    value="auvergne-rhone-alpes/allier"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Allier
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/alpes-de-haute-provence"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Alpes de Haute Provence
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/alpes-maritimes"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Alpes Maritimes
                  </option>
                  <option
                    value="auvergne-rhone-alpes/ardeche"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Ardéche
                  </option>
                  <option
                    value="grand-est/ardennes"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Ardennes
                  </option>
                  <option
                    value="occitanie/ariege"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Ariége
                  </option>
                  <option
                    value="grand-est/aube"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Aube
                  </option>
                  <option
                    value="occitanie/aude"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Aude
                  </option>
                  <option
                    value="occitanie/aveyron"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Aveyron
                  </option>
                  <option
                    value="grand-est/bas-rhin"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Bas-Rhin
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/bouches-du-rhone"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Bouches du Rhône
                  </option>
                  <option
                    value="normandie/calvados"
                    data-test="normandie"
                    data-region="9"
                  >
                    Calvados
                  </option>
                  <option
                    value="auvergne-rhone-alpes/cantal"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Cantal
                  </option>
                  <option
                    value="nouvelle-aquitaine/charente"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Charente
                  </option>
                  <option
                    value="nouvelle-aquitaine/charente-maritime"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Charente Maritime
                  </option>
                  <option
                    value="centre-val-de-loire/cher"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Cher
                  </option>
                  <option
                    value="nouvelle-aquitaine/correze"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Corréze
                  </option>
                  <option
                    value="corse/corse-du-sud"
                    data-test="corse"
                    data-region="5"
                  >
                    Corse du sud
                  </option>
                  <option
                    value="bretagne/cotes-d-armor"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Côtes-d'Armor
                  </option>
                  <option
                    value="bourgogne-franche-comte/cotes-d-or"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Côtes-d'Or
                  </option>
                  <option
                    value="nouvelle-aquitaine/creuse"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Creuse
                  </option>
                  <option
                    value="nouvelle-aquitaine/deux-sevres"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Deux-Sèvres
                  </option>
                  <option
                    value="nouvelle-aquitaine/dordogne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Dordogne
                  </option>
                  <option
                    value="bourgogne-franche-comte/doubs"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Doubs
                  </option>
                  <option
                    value="auvergne-rhone-alpes/drome"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Drôme
                  </option>
                  <option
                    value="ile-de-france/essonne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Essonne
                  </option>
                  <option
                    value="normandie/eure"
                    data-test="normandie"
                    data-region="9"
                  >
                    Eure
                  </option>
                  <option
                    value="centre-val-de-loire/eure-et-loir"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Eure et Loir
                  </option>
                  <option
                    value="bretagne/finistere"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Finistére
                  </option>
                  <option
                    value="occitanie/gard"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Gard
                  </option>
                  <option
                    value="occitanie/gers"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Gers
                  </option>
                  <option
                    value="nouvelle-aquitaine/gironde"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Gironde
                  </option>
                  <option
                    value="guadeloupe/guadeloupe"
                    data-test="guadeloupe"
                    data-region="14"
                  >
                    Guadeloupe
                  </option>
                  <option
                    value="guyane/guyane"
                    data-test="guyane"
                    data-region="15"
                  >
                    Guyane
                  </option>
                  <option
                    value="grand-est/haut-rhin"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Haut-Rhin
                  </option>
                  <option
                    value="corse/haute-corse"
                    data-test="corse"
                    data-region="5"
                  >
                    Haute corse
                  </option>
                  <option
                    value="occitanie/haute-garonne"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Haute-Garonne
                  </option>
                  <option
                    value="auvergne-rhone-alpes/haute-loire"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Haute-Loire
                  </option>
                  <option
                    value="grand-est/haute-marne"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Haute-Marne
                  </option>
                  <option
                    value="bourgogne-franche-comte/haute-saone"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Haute-Saône
                  </option>
                  <option
                    value="auvergne-rhone-alpes/haute-savoie"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Haute-Savoie
                  </option>
                  <option
                    value="nouvelle-aquitaine/haute-vienne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Haute-Vienne
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/hautes-alpes"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Hautes-Alpes
                  </option>
                  <option
                    value="occitanie/hautes-pyrenees"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Hautes-Pyrénées
                  </option>
                  <option
                    value="ile-de-france/hauts-de-seine"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Hauts de Seine
                  </option>
                  <option
                    value="occitanie/herault"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Hérault
                  </option>
                  <option
                    value="bretagne/ile-et-vilaine"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Ile et Vilaine
                  </option>
                  <option
                    value="centre-val-de-loire/indre"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Indre
                  </option>
                  <option
                    value="centre-val-de-loire/indre-et-loire"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Indre et Loire
                  </option>
                  <option
                    value="auvergne-rhone-alpes/isere"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Isére
                  </option>
                  <option
                    value="bourgogne-franche-comte/jura"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Jura
                  </option>
                  <option
                    value="nouvelle-aquitaine/landes"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Landes
                  </option>
                  <option
                    value="centre-val-de-loire/loir-et-cher"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Loir et Cher
                  </option>
                  <option
                    value="auvergne-rhone-alpes/loire"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Loire
                  </option>
                  <option
                    value="pays-de-la-loire/loire-atlantique"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Loire Atlantique
                  </option>
                  <option
                    value="centre-val-de-loire/loiret"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Loiret
                  </option>
                  <option
                    value="occitanie/lot"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Lot
                  </option>
                  <option
                    value="nouvelle-aquitaine/lot-et-garonne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Lot et Garonne
                  </option>
                  <option
                    value="occitanie/lozere"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Lozére
                  </option>
                  <option
                    value="pays-de-la-loire/maine-et-loire"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Maine et Loire
                  </option>
                  <option
                    value="normandie/manche"
                    data-test="normandie"
                    data-region="9"
                  >
                    Manche
                  </option>
                  <option
                    value="grand-est/marne"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Marne
                  </option>
                  <option
                    value="martinique/martinique"
                    data-test="martinique"
                    data-region="16"
                  >
                    Martinique
                  </option>
                  <option
                    value="pays-de-la-loire/mayenne"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Mayenne
                  </option>
                  <option
                    value="mayotte/mayotte"
                    data-test="mayotte"
                    data-region="18"
                  >
                    Mayotte
                  </option>
                  <option
                    value="grand-est/meurthe-et-moselle"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Meurthe et Moselle
                  </option>
                  <option
                    value="grand-est/meuse"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Meuse
                  </option>
                  <option
                    value="bretagne/morbihan"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Morbihan
                  </option>
                  <option
                    value="grand-est/moselle"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Moselle
                  </option>
                  <option
                    value="bourgogne-franche-comte/nievre"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Niévre
                  </option>
                  <option
                    value="hauts-de-france/nord"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Nord
                  </option>
                  <option
                    value="hauts-de-france/oise"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Oise
                  </option>
                  <option
                    value="normandie/orne"
                    data-test="normandie"
                    data-region="9"
                  >
                    Orne
                  </option>
                  <option
                    value="ile-de-france/paris"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Paris
                  </option>
                  <option
                    value="hauts-de-france/pas-de-calais"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Pas de Calais
                  </option>
                  <option
                    value="auvergne-rhone-alpes/puy-de-dome"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Puy de Dôme
                  </option>
                  <option
                    value="occitanie/pyrenees-orientales"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Pyrénées Orientales
                  </option>
                  <option
                    value="nouvelle-aquitaine/pyrenees-atlantiques"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Pyrénées-Atlantiques
                  </option>
                  <option
                    value="reunion/reunion"
                    data-test="reunion"
                    data-region="17"
                  >
                    Réunion
                  </option>
                  <option
                    value="auvergne-rhone-alpes/rhone"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Rhône
                  </option>
                  <option
                    value="bourgogne-franche-comte/saone-et-loire"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Saône et Loire
                  </option>
                  <option
                    value="pays-de-la-loire/sarthe"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Sarthe
                  </option>
                  <option
                    value="auvergne-rhone-alpes/savoie"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Savoie
                  </option>
                  <option
                    value="ile-de-france/seine-et-marne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Seine et Marne
                  </option>
                  <option
                    value="normandie/seine-maritime"
                    data-test="normandie"
                    data-region="9"
                  >
                    Seine Maritime
                  </option>
                  <option
                    value="ile-de-france/seine-saint-denis"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Seine Saint Denis
                  </option>
                  <option
                    value="hauts-de-france/somme"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Somme
                  </option>
                  <option
                    value="occitanie/tarn"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Tarn
                  </option>
                  <option
                    value="occitanie/tarn-et-garonne"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Tarn et Garonne
                  </option>
                  <option
                    value="bourgogne-franche-comte/territoire-de-belfort"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Territoire de Belfort
                  </option>
                  <option
                    value="ile-de-france/val-d-oise"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Val d'Oise
                  </option>
                  <option
                    value="ile-de-france/val-de-marne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Val de Marne
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/var"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Var
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/vaucluse"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Vaucluse
                  </option>
                  <option
                    value="pays-de-la-loire/vendee"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Vendée
                  </option>
                  <option
                    value="nouvelle-aquitaine/vienne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Vienne
                  </option>
                  <option
                    value="grand-est/vosges"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Vosges
                  </option>
                  <option
                    value="bourgogne-franche-comte/yonne"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Yonne
                  </option>
                  <option
                    value="ile-de-france/yvelines"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Yvelines
                  </option>
                </select>
              </div>
              <div class="select-group">
                <i class="lni-menu marg-r-XXS"></i>
                <select name="search_services">
                  <option value="" selected="selected">Catégories</option>
                  <option value="beaute-bien-etre">Beauté Bien-être</option>
                  <option value="travail">Travail</option>
                  <option value="maison">Maison</option>
                  <option value="aide-a-la-personne">Aide à la personne</option>
                  <option value="cours">Cours</option>
                  <option value="loisirs">Loisirs</option>
                  <option value="bricolage">Bricolage</option>
                  <option value="vehicules">Véhicules</option>
                  <option value="vacances">Vacances</option>
                  <option value="mode">Mode</option>
                </select>
              </div>
              <button class="highlight" name="form_search_dispatcher">
                <i class="lni-search"></i><span>RECHERCHER</span>
              </button>
            </form>
          </div>
          @else
          <p></p>
          @endif

          <div
            id="box-headersearch"
            class="box clearfix"
            data-box="ES header HeaderSearch"
          >
            <form
              action="https://www.echange-service.com/search/dispatcher"
              method="post"
              class="clearfix"
            >
              <div class="select-group">
                <i class="lni-map-marker marg-r-XXS"></i>
                <select name="search_region" id="search-region">
                  <option value="" class="bold">Toute la France / Régions</option>
                  <option value="auvergne-rhone-alpes" data-region="1">
                    Auvergne-Rhône-Alpes
                  </option>
                  <option value="bourgogne-franche-comte" data-region="2">
                    Bourgogne-Franche-Comté
                  </option>
                  <option value="bretagne" data-region="3">Bretagne</option>
                  <option value="centre-val-de-loire" data-region="4">
                    Centre-Val de Loire
                  </option>
                  <option value="corse" data-region="5">Corse</option>
                  <option value="grand-est" data-region="6">Grand Est</option>
                  <option value="guadeloupe" data-region="14">Guadeloupe</option>
                  <option value="guyane" data-region="15">Guyane</option>
                  <option value="hauts-de-france" data-region="7">
                    Hauts-de-France
                  </option>
                  <option value="ile-de-france" data-region="8">
                    Île-de-France
                  </option>
                  <option value="martinique" data-region="16">Martinique</option>
                  <option value="mayotte" data-region="18">Mayotte</option>
                  <option value="normandie" data-region="9">Normandie</option>
                  <option value="nouvelle-aquitaine" data-region="10">
                    Nouvelle-Aquitaine
                  </option>
                  <option value="occitanie" data-region="11">Occitanie</option>
                  <option value="pays-de-la-loire" data-region="12">
                    Pays de la Loire
                  </option>
                  <option value="provence-alpes-cote-d-azur" data-region="13">
                    Provence-Alpes-Côte d'Azur
                  </option>
                  <option value="reunion" data-region="17">Réunion</option>
                </select>
              </div>
              <div class="select-group">
                <i class="lni-map-marker marg-r-XXS"></i>
                <select name="search_department" id="search-department">
                  <option value="" selected="selected">Départements</option>
                  <option
                    value="auvergne-rhone-alpes/ain"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Ain
                  </option>
                  <option
                    value="hauts-de-france/aisne"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Aisne
                  </option>
                  <option
                    value="auvergne-rhone-alpes/allier"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Allier
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/alpes-de-haute-provence"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Alpes de Haute Provence
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/alpes-maritimes"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Alpes Maritimes
                  </option>
                  <option
                    value="auvergne-rhone-alpes/ardeche"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Ardéche
                  </option>
                  <option
                    value="grand-est/ardennes"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Ardennes
                  </option>
                  <option
                    value="occitanie/ariege"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Ariége
                  </option>
                  <option
                    value="grand-est/aube"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Aube
                  </option>
                  <option
                    value="occitanie/aude"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Aude
                  </option>
                  <option
                    value="occitanie/aveyron"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Aveyron
                  </option>
                  <option
                    value="grand-est/bas-rhin"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Bas-Rhin
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/bouches-du-rhone"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Bouches du Rhône
                  </option>
                  <option
                    value="normandie/calvados"
                    data-test="normandie"
                    data-region="9"
                  >
                    Calvados
                  </option>
                  <option
                    value="auvergne-rhone-alpes/cantal"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Cantal
                  </option>
                  <option
                    value="nouvelle-aquitaine/charente"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Charente
                  </option>
                  <option
                    value="nouvelle-aquitaine/charente-maritime"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Charente Maritime
                  </option>
                  <option
                    value="centre-val-de-loire/cher"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Cher
                  </option>
                  <option
                    value="nouvelle-aquitaine/correze"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Corréze
                  </option>
                  <option
                    value="corse/corse-du-sud"
                    data-test="corse"
                    data-region="5"
                  >
                    Corse du sud
                  </option>
                  <option
                    value="bretagne/cotes-d-armor"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Côtes-d'Armor
                  </option>
                  <option
                    value="bourgogne-franche-comte/cotes-d-or"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Côtes-d'Or
                  </option>
                  <option
                    value="nouvelle-aquitaine/creuse"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Creuse
                  </option>
                  <option
                    value="nouvelle-aquitaine/deux-sevres"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Deux-Sèvres
                  </option>
                  <option
                    value="nouvelle-aquitaine/dordogne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Dordogne
                  </option>
                  <option
                    value="bourgogne-franche-comte/doubs"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Doubs
                  </option>
                  <option
                    value="auvergne-rhone-alpes/drome"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Drôme
                  </option>
                  <option
                    value="ile-de-france/essonne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Essonne
                  </option>
                  <option
                    value="normandie/eure"
                    data-test="normandie"
                    data-region="9"
                  >
                    Eure
                  </option>
                  <option
                    value="centre-val-de-loire/eure-et-loir"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Eure et Loir
                  </option>
                  <option
                    value="bretagne/finistere"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Finistére
                  </option>
                  <option
                    value="occitanie/gard"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Gard
                  </option>
                  <option
                    value="occitanie/gers"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Gers
                  </option>
                  <option
                    value="nouvelle-aquitaine/gironde"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Gironde
                  </option>
                  <option
                    value="guadeloupe/guadeloupe"
                    data-test="guadeloupe"
                    data-region="14"
                  >
                    Guadeloupe
                  </option>
                  <option
                    value="guyane/guyane"
                    data-test="guyane"
                    data-region="15"
                  >
                    Guyane
                  </option>
                  <option
                    value="grand-est/haut-rhin"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Haut-Rhin
                  </option>
                  <option
                    value="corse/haute-corse"
                    data-test="corse"
                    data-region="5"
                  >
                    Haute corse
                  </option>
                  <option
                    value="occitanie/haute-garonne"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Haute-Garonne
                  </option>
                  <option
                    value="auvergne-rhone-alpes/haute-loire"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Haute-Loire
                  </option>
                  <option
                    value="grand-est/haute-marne"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Haute-Marne
                  </option>
                  <option
                    value="bourgogne-franche-comte/haute-saone"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Haute-Saône
                  </option>
                  <option
                    value="auvergne-rhone-alpes/haute-savoie"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Haute-Savoie
                  </option>
                  <option
                    value="nouvelle-aquitaine/haute-vienne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Haute-Vienne
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/hautes-alpes"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Hautes-Alpes
                  </option>
                  <option
                    value="occitanie/hautes-pyrenees"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Hautes-Pyrénées
                  </option>
                  <option
                    value="ile-de-france/hauts-de-seine"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Hauts de Seine
                  </option>
                  <option
                    value="occitanie/herault"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Hérault
                  </option>
                  <option
                    value="bretagne/ile-et-vilaine"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Ile et Vilaine
                  </option>
                  <option
                    value="centre-val-de-loire/indre"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Indre
                  </option>
                  <option
                    value="centre-val-de-loire/indre-et-loire"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Indre et Loire
                  </option>
                  <option
                    value="auvergne-rhone-alpes/isere"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Isére
                  </option>
                  <option
                    value="bourgogne-franche-comte/jura"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Jura
                  </option>
                  <option
                    value="nouvelle-aquitaine/landes"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Landes
                  </option>
                  <option
                    value="centre-val-de-loire/loir-et-cher"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Loir et Cher
                  </option>
                  <option
                    value="auvergne-rhone-alpes/loire"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Loire
                  </option>
                  <option
                    value="pays-de-la-loire/loire-atlantique"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Loire Atlantique
                  </option>
                  <option
                    value="centre-val-de-loire/loiret"
                    data-test="centre-val-de-loire"
                    data-region="4"
                  >
                    Loiret
                  </option>
                  <option
                    value="occitanie/lot"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Lot
                  </option>
                  <option
                    value="nouvelle-aquitaine/lot-et-garonne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Lot et Garonne
                  </option>
                  <option
                    value="occitanie/lozere"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Lozére
                  </option>
                  <option
                    value="pays-de-la-loire/maine-et-loire"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Maine et Loire
                  </option>
                  <option
                    value="normandie/manche"
                    data-test="normandie"
                    data-region="9"
                  >
                    Manche
                  </option>
                  <option
                    value="grand-est/marne"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Marne
                  </option>
                  <option
                    value="martinique/martinique"
                    data-test="martinique"
                    data-region="16"
                  >
                    Martinique
                  </option>
                  <option
                    value="pays-de-la-loire/mayenne"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Mayenne
                  </option>
                  <option
                    value="mayotte/mayotte"
                    data-test="mayotte"
                    data-region="18"
                  >
                    Mayotte
                  </option>
                  <option
                    value="grand-est/meurthe-et-moselle"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Meurthe et Moselle
                  </option>
                  <option
                    value="grand-est/meuse"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Meuse
                  </option>
                  <option
                    value="bretagne/morbihan"
                    data-test="bretagne"
                    data-region="3"
                  >
                    Morbihan
                  </option>
                  <option
                    value="grand-est/moselle"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Moselle
                  </option>
                  <option
                    value="bourgogne-franche-comte/nievre"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Niévre
                  </option>
                  <option
                    value="hauts-de-france/nord"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Nord
                  </option>
                  <option
                    value="hauts-de-france/oise"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Oise
                  </option>
                  <option
                    value="normandie/orne"
                    data-test="normandie"
                    data-region="9"
                  >
                    Orne
                  </option>
                  <option
                    value="ile-de-france/paris"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Paris
                  </option>
                  <option
                    value="hauts-de-france/pas-de-calais"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Pas de Calais
                  </option>
                  <option
                    value="auvergne-rhone-alpes/puy-de-dome"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Puy de Dôme
                  </option>
                  <option
                    value="occitanie/pyrenees-orientales"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Pyrénées Orientales
                  </option>
                  <option
                    value="nouvelle-aquitaine/pyrenees-atlantiques"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Pyrénées-Atlantiques
                  </option>
                  <option
                    value="reunion/reunion"
                    data-test="reunion"
                    data-region="17"
                  >
                    Réunion
                  </option>
                  <option
                    value="auvergne-rhone-alpes/rhone"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Rhône
                  </option>
                  <option
                    value="bourgogne-franche-comte/saone-et-loire"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Saône et Loire
                  </option>
                  <option
                    value="pays-de-la-loire/sarthe"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Sarthe
                  </option>
                  <option
                    value="auvergne-rhone-alpes/savoie"
                    data-test="auvergne-rhone-alpes"
                    data-region="1"
                  >
                    Savoie
                  </option>
                  <option
                    value="ile-de-france/seine-et-marne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Seine et Marne
                  </option>
                  <option
                    value="normandie/seine-maritime"
                    data-test="normandie"
                    data-region="9"
                  >
                    Seine Maritime
                  </option>
                  <option
                    value="ile-de-france/seine-saint-denis"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Seine Saint Denis
                  </option>
                  <option
                    value="hauts-de-france/somme"
                    data-test="hauts-de-france"
                    data-region="7"
                  >
                    Somme
                  </option>
                  <option
                    value="occitanie/tarn"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Tarn
                  </option>
                  <option
                    value="occitanie/tarn-et-garonne"
                    data-test="occitanie"
                    data-region="11"
                  >
                    Tarn et Garonne
                  </option>
                  <option
                    value="bourgogne-franche-comte/territoire-de-belfort"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Territoire de Belfort
                  </option>
                  <option
                    value="ile-de-france/val-d-oise"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Val d'Oise
                  </option>
                  <option
                    value="ile-de-france/val-de-marne"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Val de Marne
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/var"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Var
                  </option>
                  <option
                    value="provence-alpes-cote-d-azur/vaucluse"
                    data-test="provence-alpes-cote-d-azur"
                    data-region="13"
                  >
                    Vaucluse
                  </option>
                  <option
                    value="pays-de-la-loire/vendee"
                    data-test="pays-de-la-loire"
                    data-region="12"
                  >
                    Vendée
                  </option>
                  <option
                    value="nouvelle-aquitaine/vienne"
                    data-test="nouvelle-aquitaine"
                    data-region="10"
                  >
                    Vienne
                  </option>
                  <option
                    value="grand-est/vosges"
                    data-test="grand-est"
                    data-region="6"
                  >
                    Vosges
                  </option>
                  <option
                    value="bourgogne-franche-comte/yonne"
                    data-test="bourgogne-franche-comte"
                    data-region="2"
                  >
                    Yonne
                  </option>
                  <option
                    value="ile-de-france/yvelines"
                    data-test="ile-de-france"
                    data-region="8"
                  >
                    Yvelines
                  </option>
                </select>
              </div>
              <div class="select-group">
                <i class="lni-menu marg-r-XXS"></i>
                <select name="search_services">
                  <option value="" selected="selected">Catégories</option>
                  <option value="beaute-bien-etre">Beauté Bien-être</option>
                  <option value="travail">Travail</option>
                  <option value="maison">Maison</option>
                  <option value="aide-a-la-personne">Aide à la personne</option>
                  <option value="cours">Cours</option>
                  <option value="loisirs">Loisirs</option>
                  <option value="bricolage">Bricolage</option>
                  <option value="vehicules">Véhicules</option>
                  <option value="vacances">Vacances</option>
                  <option value="mode">Mode</option>
                </select>
              </div>
              <button class="highlight" name="form_search_dispatcher">
                <i class="lni-search"></i><span>RECHERCHER</span>
              </button>
            </form>
          </div>
          @if(Route::currentRouteName() === 'login')
          <div id="box-headerbreadcrumb" class="box clearfix"  data-box="CMS header HeaderBreadcrumb">
                       <div class="marg-b" >
                            <a href="{{ route('home') }}" title="" class="text-lighter" >Accueil</a> / <span class="sub-breadcrumb">Connexion</span>
                        </div>
            </div>
            @elseif(Route::currentRouteName() === 'register')
            <div id="box-headerbreadcrumb" class="box clearfix"  data-box="CMS header HeaderBreadcrumb">
              <div class="marg-b" >
                   <a href="{{ route('home') }}" title="" class="text-lighter" >Accueil</a> / <span class="sub-breadcrumb">Inscription</span>
               </div>
   </div>
            @endif
        </div>
      </header>








        @yield('content')











      <footer>
        <div class="container-center">
          <div
            id="box-footertext"
            class="box clearfix"
            data-box="CMS footer FooterText"
          >
            <a href="index.html" title="">
              <img src="{{asset('assets/frontoffice/img/logo_es.png')}}" alt="Echange & Service - " />
            </a>
            <p>
              Échange Service met en relation gratuitement et sans commission, les
              membres de sa communauté qui proposent et recherchent des biens et
              des services à échanger, à louer, à vendre !
            </p>
            <button
              type="button"
              class="highlight block marg-t"
              data-goto="{{ route('register') }}">
              Inscription Gratuite
            </button>
          </div>
          <div
            id="box-footernewads"
            class="box clearfix"
            data-box="CMS footer FooterNewAds"
          >
            <h5 class="title-underline">Nouvelles annonces</h5>
            <div class="ad-box-mini clearfix">
              <div class="ad-image clearfix">
                <div class="image-container">
                  <a class="title" href="annonce/4964.html" title="">
                    <img src="{{asset('assets/frontoffice/img/upload/ads/4964_65069aaf2320e.jpg')}}" alt="Thérapeute reki bols tibétains magnétisme - Saint-Aubin-d'Aubigné" />
                  </a>
                </div>
              </div>
              <div class="ad-content clearfix">
                <a href="annonce/4964.html" title="" class="block marg-b-XXS"
                  >Thérapeute reki bols tibétains magnétisme</a
                >
                <i class="lni-map-marker small marg-r-XXS"></i
                >Saint-Aubin-d'Aubigné
              </div>
            </div>

            <div class="ad-box-mini clearfix">
              <div class="ad-image clearfix">
                <div class="image-container">
                  <a class="title" href="annonce/4962.html" title="">
                    <img src="{{asset('assets/frontoffice/img/upload/services/vehicules.jpg')}}" alt="Véhicule utilitaire - Saintes"/>
                  </a>
                </div>
              </div>
              <div class="ad-content clearfix">
                <a href="annonce/4962.html" title="" class="block marg-b-XXS" >Véhicule utilitaire</a>
                <i class="lni-map-marker small marg-r-XXS"></i>Saintes
              </div>
            </div>
          </div>
          <div
            id="box-footernewmembers"
            class="box clearfix"
            data-box="CMS footer FooterNewMembers"
          >
            <h5 class="title-underline">Nouveaux membres</h5>
            <div class="member-box-mini clearfix">
              <div class="member-image">
                <div
                  class="img-container xsmall blue cursor"
                  data-goto="/profil/Clotilde59"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_f.png')}}"
                    alt="Clotilde59 - Tressin"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <a href="profil/Clotilde59.html" title="" class="block bold"
                  >Clotilde59</a
                >
                <a href="profil/Clotilde59.html" title="" class="see-item"
                  >Voir le profil</a
                >
              </div>
            </div>

            <div class="member-box-mini clearfix">
              <div class="member-image">
                <div
                  class="img-container xsmall blue cursor"
                  data-goto="/profil/GeraldineD"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_f.png')}}"
                    alt="GeraldineD - Croix"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <a href="profil/GeraldineD.html" title="" class="block bold"
                  >GeraldineD</a
                >
                <a href="profil/GeraldineD.html" title="" class="see-item"
                  >Voir le profil</a
                >
              </div>
            </div>
          </div>
          <div
            id="box-footerlinks"
            class="box clearfix"
            data-box="CMS footer FooterLinks"
          >
            <h5 class="title-underline">Informations</h5>
            <ul>
              <li><a href="faq.html" title="">FAQ</a></li>
              <li><a href="cgu-cgv.html" title="">Conditions d'utilsation</a></li>
              <li>
                <a href="politique-de-confidentialite.html" title=""
                  >Politique de confidentialité</a
                >
              </li>
              <li>
                <a href="mentions-legales.html" title="">Mentions légales</a>
              </li>
              <li><a href="contact.html" title="">Contactez-nous</a></li>
            </ul>
          </div>
        </div>
      </footer>



      <section id="bottom">
        <div id="box-legals" class="box clearfix" data-box="CMS bottom Legals">
          © 2009-2023 Echange-Service.com - Service Proposé par
          <a
            href="https://www.webcom.me/"
            title="Création de site internet Cherbourg-en-cotentin - Manche"
            target="_blank"
            >WebCom.Me</a
          >
        </div>
      </section>

      <script type="text/javascript" src="{{asset('assets/frontoffice/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/Home.EchangeService.1.css.css')}}"/>
      <script type="text/javascript" src="{{asset('assets/frontoffice/js/generate/Home.EchangeService.1.js.php')}}"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/css/generate/LineIcons.min.css')}}" />
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
  </body>




      </html>
