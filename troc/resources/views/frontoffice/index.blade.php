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
              {{-- <li>
                <a href="communaute.html" title="" class="link"
                  ><i class="lni-users"></i>CHAT</a
                >
              </li> --}}
              
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
            </ul>
          </div>
        </div>
      </section>
      <header class="clearfix home">
        <div class="container-center clearfix">
          <div class="clear"></div>


          @if(!auth()->check())
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
  
          @else
          <!-- User is not logged in, do not show the "logout" button -->
         @endif


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