@extends('frontoffice.index')

@section('content')
<section id="main" class="clearfix full">
  @if (auth()->check())
  <!-- Members slider -->
  <div id="home-members-container" class="clearfix">
      <div class="container-center clearfix">
          <div id="slide-members" class="owl-carousel">
              @foreach ($products as $product)
                  <div class="member-box clearfix" id="productDiv" data-product-id="{{ $product->id }}">
                      <span class="member-offline">&#9679;</span>
                      <div class="member-image">
                          <div class="img-container blue cursor" data-goto="/profil/GeraldineD">
                              @if ($product->user->profile_photo_url)
                                  <img src="{{ $product->user->profile_photo_url }}" alt="{{ $product->user->name }}" />
                              @else
                                  <img src="{{ asset('assets/frontoffice/img/EchangeService/avatar_f.png') }}" alt="Default User Photo" class="user-photo">
                              @endif
                          </div>
                      </div>

                      <div class "member-content clearfix">
                          <div class="member-details">
                              <a href="profil/GeraldineD.html" title="">
                                  <i class="lni-user marg-r-XXS"></i> <span>{{ $product->user->name }}</span>
                              </a>
                              <i class="lni-map-marker marg-r-XXS"></i><span>Croix</span>
                          </div>
                          <a href="{{ route('products.show', ['product' => $product['id']]) }}" class="flex justify-end py-2 px-4 rounded-2xl">
                              <i class="lni-check-box marg-r-XS py-1"></i><span>Voir le Detail</span>
                          </a>
                      </div>
                      <div class="member-services clearfix">

                          @if (!$product->is_offering)
                              <div>
                                  <strong>Je cherche :</strong><span class="text-color1">{{ $product->name }}</span><br>
                                  @if ($product->exchange_for)
                                      <strong>Echange contre : </strong><span class="text-color1"> {{ $product->exchange_for }} </span> <br>
                                  @else
                                      <strong>Prix : </strong><span class="text-color1"> {{ $product->price }} </span><strong class="font-bold"> DT</strong>
                                  @endif
                              </div>
                          @else
                              <div>
                                  <strong>Je propose : </strong><span class="text-color1"> {{ $product->name }} </span> <br>
                                  @if ($product->exchange_for)
                                      <strong>Echange contre : </strong><span class="text-color1"> {{ $product->exchange_for }} </span>, <br>
                                  @else
                                      <strong>Prix : </strong><span class="text-color1"> {{ $product->price }} </span><strong class="font-bold"> DT</strong>
                                  @endif
                              </div>
                          @endif
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
  @else
  <!-- User is not logged in, do not show the "logout" button -->
  @endif

  @if (!auth()->check())
  <!-- Register link -->
  <div class="text-center marg-t-XL marg-b-XL">
      <a href="{{ route('register') }}" title="" class="button large highlight">Rejoignez la communauté, c'est gratuit !</a>
  </div>
  @else
  @endif

  <!-- Services categories -->
  <div class="width-80 marg-r-auto marg-l-auto clearfix">
      <div id="home-services-container">
          @foreach ($categories as $category)
          <div class="service-category">
              <i class="{{ $category->icon }}"></i><a href="{{ route('products.index', ['category' => $category->id]) }}" class="service-title" title="">{{ $category->name }}</a>
              @if ($category->subcategories->isNotEmpty())
              <div>
                  @foreach ($category->subcategories as $subcategory)
                  <a href="{{ route('products.index', ['subcategory' => $subcategory->id]) }}" class="sub-service" title="">{{ $subcategory->name }}</a>
                  @endforeach
              </div>
              @else
              <div>
                  <span>No subcategories available</span>
              </div>
              @endif
          </div>
          @endforeach
      </div>
  </div>

  <div id="home-accounts-info" class="container-center">
      <h4 id="title">
          COMPTE <span class="text-color1">GRATUIT</span> OU <span class="text-color2">PREMIUM</span>
      </h4>
      @if (!auth()->check())
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
          <a href="user/register.html" title="" class="button highlight">Inscrivez-vous</a>
      </div>
      @else
      @endif

      <div class="container">
    <h1 class="text-center">Available Plans</h1>
    <div class="row justify-content-center">
        @foreach ($plans as $plan)
            <div class="col-md-6 mb-4">
                <div class="box-account-info box-account-premium" style="margin-right: 20px;">
                    <i class="lni-medall text-color2"></i>
                    <h6>{{ $plan->name }}</h6>
                    <div class="price text-color2">
                        <span>{{ $plan->price }}</span><sup>€</sup>/ An
                    </div>
                    <div class="marg-b-L">
                        {{ $plan->description }}
                    </div>
                    <div class="price text-color1">
                        <span>{{ $plan->remise }}</span><sup>%</sup> Remise sur tout les articles
                    </div>

                    <form method="POST" action="{{ route('payment.process', $plan->id) }}">
                    @csrf
                    <button type="submit" class="button">Inscrivez-vous</button>
                </form>
                </div>
            </div>
        @endforeach
    </div>
</div>




</div>




      <!-- Info boxes -->
  <div id="home-infoboxes-container">
      <div class="container-center">
          <div>
              <i class="lni-user"></i>
              <h4>Créer votre profil</h4>
              <p>L'inscription est gratuite! Indiquez les services que vous recherchez et proposez pour apparaître dans les résultats.</p>
          </div>
          <div>
              <i class="lni-layers"></i>
              <h4>Publiez vos annonces</h4>
              <p>Besoin d'aide rapidement? Créez votre annonce pour vendre, échanger, troquer vos biens ou vos services.</p>
          </div>
          <div>
              <i class="lni-headphone-alt"></i>
              <h4>Mise en relation</h4>
              <p>Contactez les membres de votre département ou votre ville grâce à la messagerie interne pour vous rencontrer.</p>
          </div>
          <div>
              <i class="lni-thumbs-up"></i>
              <h4>Avis & Notes</h4>
              <p>Lors de vos échanges avec la communauté d'Echange Service, chaque membre pourra noter et donner son avis.</p>
          </div>
      </div>
  </div>

  @if (!auth()->check())
  @else
  @endif
</section>
@endsection
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