@extends('frontoffice.index')

@section('content')

<section id="main" class="clearfix full">
    @if(auth()->check())
     <!-- Members slider -->
     <div id="home-members-container" class="clearfix">
        <div class="container-center clearfix">
          <div id="slide-members" class="owl-carousel">
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div
                  class="img-container blue cursor"
                  data-goto="/profil/GeraldineD"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_f.png')}}"
                    alt="GeraldineD - Croix"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/GeraldineD.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>GeraldineD</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i><span>Croix</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/GeraldineD"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div>
                  <strong>Je recherche :</strong> Aucun service actuellement
                </div>
                <div>
                  <strong>Je propose :</strong> Aucun service actuellement
                </div>
              </div>
            </div>
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div
                  class="img-container blue cursor"
                  data-goto="/profil/Clotilde59"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_f.png')}}"
                    alt="Clotilde59 - Tressin"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/Clotilde59.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>Clotilde59</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i><span>Tressin</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/Clotilde59"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div>
                  <strong>Je recherche :</strong> Aucun service actuellement
                </div>
                <div>
                  <strong>Je propose :</strong> Aucun service actuellement
                </div>
              </div>
            </div>
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div
                  class="img-container blue cursor"
                  data-goto="/profil/Adrien"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_m.png')}}"
                    alt="Adrien - Levallois-Perret"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/Adrien.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>Adrien</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i
                  ><span>Levallois-Perret</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/Adrien"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div>
                  <strong>Je recherche :</strong> Aucun service actuellement
                </div>
                <div>
                  <strong>Je propose :</strong> Aucun service actuellement
                </div>
              </div>
            </div>
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div
                  class="img-container blue cursor"
                  data-goto="/profil/Helios"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_m.png')}}"
                    alt="Helios - Lyon"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/Helios.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>Helios</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i><span>Lyon</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/Helios"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div>
                  <strong>Je recherche :</strong> Massage, Yoga, Sport &
                  Hobbies, Vins & Gastronomie
                </div>
                <div>
                  <strong>Je propose :</strong> Massage, Sport & Hobbies, Vins &
                  Gastronomie
                </div>
              </div>
            </div>
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div
                  class="img-container blue cursor"
                  data-goto="/profil/Calimas"
                >
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_m.png')}}"
                    alt="Calimas - Pomps"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/Calimas.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>Calimas</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i><span>Pomps</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/Calimas"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div><strong>Je recherche :</strong> Massage</div>
                <div><strong>Je propose :</strong> Massage</div>
              </div>
            </div>
            <div class="member-box clearfix">
              <span class="member-offline">&#9679;</span>
              <div class="member-image">
                <div class="img-container blue cursor" data-goto="/profil/Zen">
                  <img
                    src="{{asset('assets/frontoffice/img/EchangeService/avatar_m.png')}}"
                    alt="Zen - Grimaud"
                  />
                </div>
              </div>
              <div class="member-content clearfix">
                <div class="member-details">
                  <a href="profil/Zen.html" title="">
                    <i class="lni-user marg-r-XXS"></i> <span>Zen</span>
                  </a>
                  <i class="lni-map-marker marg-r-XXS"></i><span>Grimaud</span>
                </div>
                <button
                  type="button"
                  class="see-member"
                  data-goto="/profil/Zen"
                >
                  <i class="lni-check-box marg-r-XS"></i
                  ><span>Voir le profil</span>
                </button>
              </div>
              <div class="member-services clearfix">
                <div><strong>Je recherche :</strong> Massage</div>
                <div><strong>Je propose :</strong> Massage</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @else
          <!-- User is not logged in, do not show the "logout" button -->
     @endif
   

     @if(!auth()->check())
       <!-- Register link -->
         <div class="text-center marg-t-XL marg-b-XL">
           <a href="{{ route('register') }}" title="" class="button large highlight"
              >Rejoignez la communauté, c'est gratuit !</a>
         </div>
     @else
          
     @endif
 <!-- Services categories -->
 <div class="width-80 marg-r-auto marg-l-auto clearfix">
    <div id="home-services-container">
   
      @foreach ($categories as $category)
      <div class="service-category">
        <i class="lni-emoji-smile"></i><a href="beaute-bien-etre.html" class="service-title" title="">{{ $category->name }}</a>
        <div>
          <a
            href="beaute-bien-etre/coaching-sportif/membres.html"
            class="sub-service"
            title=""
            >Coaching</a
          >
          <a
            href="beaute-bien-etre/coiffure.html"
            class="sub-service"
            title=""
            >Coiffure</a
          >
          <a
            href="beaute-bien-etre/manucure/membres.html"
            class="sub-service"
            title=""
            >Manucure</a
          >
          <a
            href="beaute-bien-etre/maquillage/membres.html"
            class="sub-service"
            title=""
            >Maquillage</a
          >
          <a
            href="beaute-bien-etre/massage.html"
            class="sub-service"
            title=""
            >Massage</a
          >
          <a
            href="beaute-bien-etre/relooking/membres.html"
            class="sub-service"
            title=""
            >Relooking</a
          >
          <a
            href="beaute-bien-etre/yoga/membres.html"
            class="sub-service"
            title=""
            >Yoga</a
          >
          <a
            href="beaute-bien-etre/autres/membres.html"
            class="sub-service"
            title=""
            >Autres</a
          >
        </div>
      </div>
      @endforeach

    </div>
  </div>


   <div id="home-accounts-info" class="container-center">
        <h4 id="title">
          COMPTE <span class="text-color1">GRATUIT</span> OU
          <span class="text-color2">PREMIUM</span>
        </h4>
        <div class="box-account-info box-account-free">
          <i class="lni-gift text-color1"></i>
          <h6>GRATUIT</h6>
          <div class="price text-color1"><span>0</span><sup>€</sup>/ An</div>
          <div class="marg-b-L">
            Une messagerie interne pour contacter les membres<br /><br />
            Votre profil dans les résultats<br />
            Connectez-vous régulièrement pour remonter dans les résultats<br /><br />
            Une Annonce maximum,<br />diffusée pendant 60 jours
          </div>
          <a href="user/register.html" title="" class="button highlight"
            >Inscrivez-vous</a
          >
        </div>
        <div class="box-account-info box-account-premium">
          <i class="lni-medall text-color2"></i>
          <h6>PREMIUM</h6>
          <div class="price text-color2"><span>19</span><sup>€</sup>/ An</div>
          <div class="marg-b-L">
            Boostez votre Compte Gratuit en
            <strong class="inline-block relative text-color2"
              >Compte Premium</strong
            ><br /><br />
            <strong>
              <i class="lni-star-filled marg-r-XXS text-color2"></i
              ><span>Votre profil mis en avant dans les résultats</span><br />
              Pour les services que vous proposez ou recherchez<br /><br />
              <i class="lni-star-filled marg-r-XXS text-color2"></i
              ><span>25 Annonces simultanées et mises en avant</span><br />
              Jusqu'à 10 images par annonce
            </strong>
          </div>
          <a href="user/register.html" title="" class="button"
            >Inscrivez-vous</a
          >
        </div>
      </div>


 
 
 
      <!-- Info boxes -->
  <div id="home-infoboxes-container">
    <div class="container-center">
      <div>
        <i class="lni-user"></i>
        <h4>Créer votre profil</h4>
        <p>
          L'inscription est gratuite ! Indiquez les services que vous
          recherchez et proposez pour apparaître dans les résultats.
        </p>
      </div>
      <div>
        <i class="lni-layers"></i>
        <h4>Publiez vos annonces</h4>
        <p>
          Besoin d'aide rapidement ? Créez votre annonce pour vendre,
          échanger, troquer vos biens ou vos services.
        </p>
      </div>
      <div>
        <i class="lni-headphone-alt"></i>
        <h4>Mise en relation</h4>
        <p>
          Contactez les membres de votre département ou votre ville grâce à
          la messagerie interne pour vous rencontrer.
        </p>
      </div>
      <div>
        <i class="lni-thumbs-up"></i>
        <h4>Avis & Notes</h4>
        <p>
          Lors de vos échanges avec la communauté d'Echange Service, chaque
          membre pourra noter et donner son avis. 
        </p>
      </div>
    </div>
  </div>

     @if(!auth()->check())

     @else
          
     @endif
    </section>
@endsection