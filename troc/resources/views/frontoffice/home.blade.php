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
      <div class="service-category">
        <i class="lni-hand"></i
        ><a href="aide-a-la-personne.html" class="service-title" title=""
          >Aide à la personne</a
        >
        <div>
          <a
            href="aide-a-la-personne/co-voiturage/membres.html"
            class="sub-service"
            title=""
            >Co-Voiturage</a
          >
          <a
            href="aide-a-la-personne/courses/membres.html"
            class="sub-service"
            title=""
            >Courses</a
          >
          <a
            href="aide-a-la-personne/demarches-administratives/membres.html"
            class="sub-service"
            title=""
            >Démarches admin.</a
          >
          <a
            href="aide-a-la-personne/depannage-informatique/membres.html"
            class="sub-service"
            title=""
            >Dépannage Informatique</a
          >
          <a
            href="aide-a-la-personne/garde-d-enfants/membres.html"
            class="sub-service"
            title=""
            >Garde d'enfants</a
          >
          <a
            href="aide-a-la-personne/lecture/membres.html"
            class="sub-service"
            title=""
            >Lecture</a
          >
          <a
            href="aide-a-la-personne/menage.html"
            class="sub-service"
            title=""
            >Ménage</a
          >
          <a
            href="aide-a-la-personne/preparation-repas/membres.html"
            class="sub-service"
            title=""
            >Préparation Repas</a
          >
          <a
            href="aide-a-la-personne/promenade-d-animaux/membres.html"
            class="sub-service"
            title=""
            >Promenade d'animaux</a
          >
          <a
            href="aide-a-la-personne/repassage/membres.html"
            class="sub-service"
            title=""
            >Repassage</a
          >
          <a
            href="aide-a-la-personne/autres.html"
            class="sub-service"
            title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-emoji-smile"></i
        ><a href="beaute-bien-etre.html" class="service-title" title=""
          >Beauté Bien-être</a
        >
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
      <div class="service-category">
        <i class="lni-paint-roller"></i
        ><a href="bricolage.html" class="service-title" title=""
          >Bricolage</a
        >
        <div>
          <a
            href="bricolage/electricite/membres.html"
            class="sub-service"
            title=""
            >Electricité</a
          >
          <a
            href="bricolage/electronique/membres.html"
            class="sub-service"
            title=""
            >Electronique</a
          >
          <a
            href="bricolage/maconnerie/membres.html"
            class="sub-service"
            title=""
            >Maçonnerie</a
          >
          <a href="bricolage/menuiserie.html" class="sub-service" title=""
            >Menuiserie</a
          >
          <a href="bricolage/outillage.html" class="sub-service" title=""
            >Outillage</a
          >
          <a
            href="bricolage/peinture/membres.html"
            class="sub-service"
            title=""
            >Peinture</a
          >
          <a
            href="bricolage/plomberie/membres.html"
            class="sub-service"
            title=""
            >Plomberie</a
          >
          <a
            href="bricolage/tapisserie/membres.html"
            class="sub-service"
            title=""
            >Tapisserie</a
          >
          <a href="bricolage/autres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-graduation"></i
        ><a href="cours.html" class="service-title" title="">Cours</a>
        <div>
          <a href="cours/cuisine.html" class="sub-service" title=""
            >Cuisine</a
          >
          <a href="cours/danse/membres.html" class="sub-service" title=""
            >Danse</a
          >
          <a
            href="cours/dessin-peinture-sculpture/membres.html"
            class="sub-service"
            title=""
            >Dessin, peinture, sculpture</a
          >
          <a href="cours/francais/membres.html" class="sub-service" title=""
            >Français</a
          >
          <a href="cours/informatique.html" class="sub-service" title=""
            >Informatique</a
          >
          <a
            href="cours/langues-etrangeres.html"
            class="sub-service"
            title=""
            >Langues étrangères</a
          >
          <a href="cours/maths/membres.html" class="sub-service" title=""
            >Maths</a
          >
          <a href="cours/musique/membres.html" class="sub-service" title=""
            >Musique</a
          >
          <a href="cours/photo/membres.html" class="sub-service" title=""
            >Photo</a
          >
          <a
            href="cours/soutien-scolaire/membres.html"
            class="sub-service"
            title=""
            >Soutien scolaire</a
          >
          <a href="cours/autres/membres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-basketball"></i
        ><a href="loisirs/membres.html" class="service-title" title=""
          >Loisirs</a
        >
        <div>
          <a
            href="loisirs/blue-ray-dvd-cd/membres.html"
            class="sub-service"
            title=""
            >Blu-ray, DVD et CD</a
          >
          <a
            href="loisirs/couture/membres.html"
            class="sub-service"
            title=""
            >Couture</a
          >
          <a
            href="loisirs/instruments-de-musique/membres.html"
            class="sub-service"
            title=""
            >Instruments de musique</a
          >
          <a
            href="loisirs/jeux-et-jouets/membres.html"
            class="sub-service"
            title=""
            >Jeux & jouets</a
          >
          <a href="loisirs/livres/membres.html" class="sub-service" title=""
            >Livres</a
          >
          <a
            href="loisirs/sport-hobbies/membres.html"
            class="sub-service"
            title=""
            >Sport & Hobbies</a
          >
          <a
            href="loisirs/vins-et-gastronomie/membres.html"
            class="sub-service"
            title=""
            >Vins & Gastronomie</a
          >
          <a href="loisirs/autres/membres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-home"></i
        ><a href="maison.html" class="service-title" title="">Maison</a>
        <div>
          <a
            href="maison/ameublement/membres.html"
            class="sub-service"
            title=""
            >Ameublement</a
          >
          <a
            href="maison/colocation/membres.html"
            class="sub-service"
            title=""
            >Colocation</a
          >
          <a
            href="maison/decoration/membres.html"
            class="sub-service"
            title=""
            >Décorarion</a
          >
          <a
            href="maison/domotique/membres.html"
            class="sub-service"
            title=""
            >Domotique</a
          >
          <a href="maison/echange/membres.html" class="sub-service" title=""
            >Echange</a
          >
          <a
            href="maison/gardiennage/membres.html"
            class="sub-service"
            title=""
            >Gardiennage</a
          >
          <a href="maison/jardinage.html" class="sub-service" title=""
            >Jardinage</a
          >
          <a
            href="maison/location/membres.html"
            class="sub-service"
            title=""
            >Location</a
          >
          <a href="maison/vente/membres.html" class="sub-service" title=""
            >Vente</a
          >
          <a href="maison/autres/membres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-tshirt"></i
        ><a href="mode/membres.html" class="service-title" title="">Mode</a>
        <div>
          <a
            href="mode/accessoires-et-bagagerie/membres.html"
            class="sub-service"
            title=""
            >Accessoires & Bagagerie</a
          >
          <a
            href="mode/bebe-enfant/membres.html"
            class="sub-service"
            title=""
            >Bébé & Enfant</a
          >
          <a
            href="mode/chaussures/membres.html"
            class="sub-service"
            title=""
            >Chaussures</a
          >
          <a
            href="mode/montres-et-bijoux/membres.html"
            class="sub-service"
            title=""
            >Montres & Bijoux</a
          >
          <a href="mode/vetements/membres.html" class="sub-service" title=""
            >Vêtements</a
          >
          <a href="mode/autres/membres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-briefcase"></i
        ><a href="travail/membres.html" class="service-title" title=""
          >Travail</a
        >
        <div>
          <a
            href="travail/archivage/membres.html"
            class="sub-service"
            title=""
            >Archivage</a
          >
          <a
            href="travail/assistance/membres.html"
            class="sub-service"
            title=""
            >Assistance</a
          >
          <a href="travail/bureau/membres.html" class="sub-service" title=""
            >Bureau</a
          >
          <a
            href="travail/comptabilite/membres.html"
            class="sub-service"
            title=""
            >Comptabilité</a
          >
          <a
            href="travail/documentation/membres.html"
            class="sub-service"
            title=""
            >Documentation</a
          >
          <a
            href="travail/proposition-emploi/membres.html"
            class="sub-service"
            title=""
            >Proposition d'emploi</a
          >
          <a
            href="travail/recherche-emploi/membres.html"
            class="sub-service"
            title=""
            >Recherche d'emploi</a
          >
          <a
            href="travail/redaction/membres.html"
            class="sub-service"
            title=""
            >Rédaction</a
          >
          <a
            href="travail/secretariat/membres.html"
            class="sub-service"
            title=""
            >Secrétariat</a
          >
          <a
            href="travail/traduction/membres.html"
            class="sub-service"
            title=""
            >Traduction</a
          >
          <a href="travail/autres/membres.html" class="sub-service" title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-sun"></i
        ><a href="vacances/membres.html" class="service-title" title=""
          >Vacances</a
        >
        <div>
          <a
            href="vacances/campings/membres.html"
            class="sub-service"
            title=""
            >Campings</a
          >
          <a
            href="vacances/chambres-hotes/membres.html"
            class="sub-service"
            title=""
            >Chambres d'hôtes</a
          >
          <a
            href="vacances/hebergements-insolites/membres.html"
            class="sub-service"
            title=""
            >Hébergements insolites</a
          >
          <a
            href="vacances/hotels/membres.html"
            class="sub-service"
            title=""
            >Hôtels</a
          >
          <a
            href="vacances/locations-et-gites/membres.html"
            class="sub-service"
            title=""
            >Location & Gîtes</a
          >
          <a
            href="vacances/autres/membres.html"
            class="sub-service"
            title=""
            >Autres</a
          >
        </div>
      </div>
      <div class="service-category">
        <i class="lni-car"></i
        ><a href="vehicules.html" class="service-title" title=""
          >Véhicules</a
        >
        <div>
          <a href="vehicules/echange.html" class="sub-service" title=""
            >Echange</a
          >
          <a
            href="vehicules/entretien/membres.html"
            class="sub-service"
            title=""
            >Entretien</a
          >
          <a
            href="vehicules/grosses-reparations.html"
            class="sub-service"
            title=""
            >Grosses Réparations</a
          >
          <a
            href="vehicules/installation/membres.html"
            class="sub-service"
            title=""
            >Installation</a
          >
          <a
            href="vehicules/location/membres.html"
            class="sub-service"
            title=""
            >Location</a
          >
          <a
            href="vehicules/nettoyage/membres.html"
            class="sub-service"
            title=""
            >Nettoyage</a
          >
          <a
            href="vehicules/petites-reparations/membres.html"
            class="sub-service"
            title=""
            >Petites Réparations</a
          >
          <a
            href="vehicules/vente/membres.html"
            class="sub-service"
            title=""
            >Vente</a
          >
          <a
            href="vehicules/autres/membres.html"
            class="sub-service"
            title=""
            >Autres</a
          >
        </div>
      </div>
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