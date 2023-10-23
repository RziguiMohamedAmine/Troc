@extends('frontoffice.index')

@section('content')
<section id="main" class="clearfix">
    <form action="{{ route('products.update', $product->id) }}" method="POST" class="form width-80" enctype="multipart/form-data" data-ajax-callback="adPostCallback">
        @csrf
        @method('PUT')
        <div id="ad-post-result"></div>
        <!-- Annonce -->
        <div class="fields-box clearfix">
            <h3>Modifier votre annonce</h3>
            <div class="padd-b">

                <div class="select-container">
                    <select name="product-is_offering" id="product-is_offering" required="required">
                        @if ($product->is_offering == 1)
                        <option value="1" @if($product->is_offering == 1) selected @endif>Je propose</option>
                        <option value="0" @if($product->is_offering == 0) selected @endif>Je recherche</option>
                        @else
                        <option value="0" @if($product->is_offering == 0) selected @endif>Je recherche</option>
                        <option value="1" @if($product->is_offering == 1) selected @endif>Je propose</option>
                        @endif
                    </select>
                    @error('product-is_offering')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                    @enderror
                </div>

                <div class="select-container">
                    <select name="product-type" required="required">
                        @if ($product->type == 'service')
                        <option value="service" @if($product->type == 'service') selected @endif >Un service</option>
                        <option value="product" @if($product->type == 'product') selected @endif >Un bien</option>
                        @else
                        <option value="product" @if($product->type == 'product') selected @endif >Un bien</option>
                        <option value="service" @if($product->type == 'service') selected @endif >Un service</option>
                        @endif
                    </select>
                    @error('product-type')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                    @enderror
                </div>

                <div class="select-container">
                    <select name="product-subcategory_id" required="required">
                        <option disabled selected>Catégorie</option>
                            @foreach ($categories as $category)
                                 <option disabled class="bold bg-light large">{{ $category->name }}</option>
                                 @if ($category->subcategories->isNotEmpty())
                                 @foreach ($category->subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" @if($product->subcategory_id == $subcategory->id) selected @endif >{{ $subcategory->name }}</option>
                                 @endforeach
                                 @else
                                 <div>
                                    <span>No subcategories available</span>
                                </div>
                                @endif
                                @endforeach
                        </select>
                        @error('product-subcategory_id')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                        @enderror
                </div>

            </div>

            <div class="padd-b">
                <div class="select-container" id="start-field" style="display: @if(old('product-is_offering', $product->is_offering) === '0' || $product->is_offering === '0') block @else none @endif;">
                    <label for="product-start_date">Date Debut</label><br>
                    <input type="date" class="rounded-lg" name="product-start_date" id="product-start_date" value="{{ $product->start_date }}" placeholder="start Date" class="inline-block width-100">
                    @error('product-start_date')
                        <div class="form-error bg-red-500 h-8 w-28 text-white rounded-md mt-1 text-start">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="select-container" id="end-field" style="display: @if(old('product-is_offering', $product->is_offering) === '0' || $product->is_offering === '0') block @else none @endif;">
                    <label for="product-end_date">Date Fin</label><br>
                    <input type="date" class="rounded-lg" name="product-end_date" id="product-end_date" value="{{ $product->end_date }}" placeholder="end Date" class="inline-block width-100">
                    @error('product-end_date')
                    <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 text-start">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>


            <div class="select-container padd-b">
                <select name="ad_exchange_type" id="ad_exchange_type" required="required">
                @if ($product->price)
                    <option value="price" @if(old('ad_exchange_type', $product->ad_exchange_type) === 'price') selected @endif>Prix</option>
                    <option value="exchange" @if(old('ad_exchange_type', $product->ad_exchange_type) === 'exchange') selected @endif>échange contre</option>
                @else
                    <option value="exchange" @if(old('ad_exchange_type', $product->ad_exchange_type) === 'exchange') selected @endif>échange contre</option>
                    <option value="price" @if(old('ad_exchange_type', $product->ad_exchange_type) === 'price') selected @endif>Prix</option>
                @endif



                </select>
            </div>

            <div class="padd-b" id="price-field" style="display: @if(old('ad_exchange_type', $product->ad_exchange_type) === 'price' || $product->ad_exchange_type === 'price') block @else none @endif;">
                <input type="number" name="product-price" id="ad_price" value="{{$product->price}}" placeholder="Price" class="inline-block width-100">
                @error('product-price')
                    <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            <div class="padd-b" id="exchange-field" style="display: @if(old('ad_exchange_type', $product->ad_exchange_type) === 'exchange' || $product->ad_exchange_type === 'exchange') block @else none @endif;">
                <input type="text" name="product-exchange_for" id="ad_exchange_for" value="{{$product->exchange_for}}" placeholder="Exchange for" class="inline-block width-100">
                @error('product-exchange_for')
                <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="padd-b ">
                <input type="text" name="product-name" value="{{$product->name}}" placeholder="Nom du service ou du bien"
                       class="inline-block width-100" maxlength="100" required="required"  />
                       @error('product-name')
                       <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                              {{$message}}
                       </div>
                    @enderror
            </div>
            <label>Description</label>
            <div class="padd-b relative">
                <textarea name="product-description" value="{{$product->description}}" rows="4" class="width-100" maxlength="255" minlength="10" required="required">{{$product->description}}</textarea>
                @error('product-description')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                @enderror
            </div>

            <!-- Image(s) -->
            <label>Une image</label>
            <div class="text-center">
                <i class="lni-download block xxlarge text-center marg-b-XS"></i>
                <input type="file" name="image" id="image" accept="image/*" value="{{$product->image}}" />

            </div>


        </div>

        <!-- Localisation -->

        <!-- Identité -->

        <div class="text-center padd-t">
            <button type="submit" class="highlight" ><span>Publier</span></button>
        </div>

    </form>
</section>
<script>
    // Add an event listener to the ad_exchange_type select element
    const adExchangeTypeSelect = document.getElementById('ad_exchange_type');
    const priceField = document.getElementById('price-field');
    const exchangeField = document.getElementById('exchange-field');

    adExchangeTypeSelect.addEventListener('change', function () {
        if (this.value === 'price') {
            priceField.style.display = 'block';
            exchangeField.style.display = 'none';
        } else if (this.value === 'exchange') {
            priceField.style.display = 'none';
            exchangeField.style.display = 'block';
        }
    });

    // Initial check for the ad_exchange_type select on page load
    if (adExchangeTypeSelect.value === 'price') {
        priceField.style.display = 'block';
        exchangeField.style.display = 'none';
    } else if (adExchangeTypeSelect.value === 'exchange') {
        priceField.style.display = 'none';
        exchangeField.style.display = 'block';
    }
</script>
<script>
    const isOfferingSelect = document.getElementById('product-is_offering');
    const startField = document.getElementById('start-field');
    const endField = document.getElementById('end-field');

    isOfferingSelect.addEventListener('change', function () {
        if (this.value === '0') {
            startField.style.display = 'block';
            endField.style.display = 'block';
        } else if (this.value === '1') {
            startField.style.display = 'none';
            endField.style.display = 'none';
        }
    });

    // Initial check for the isOffering select on page load
    if (isOfferingSelect.value === '0') {
        startField.style.display = 'block';
        endField.style.display = 'block';
    } else if (isOfferingSelect.value === '1') {
        startField.style.display = 'none';
        endField.style.display = 'none';
    }
</script>
@endsection
