@extends('frontoffice.index')

@section('content')
<section id="main" class="clearfix">   
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    
    
    <h1 class="text-center title-underline-center">Publier une annonce</h1>
    <div id="ad-publish" style="margin-left: 170px">

    
        <form action="{{route('products.store')}}" method="post" class="form width-80" enctype="multipart/form-data" data-ajax-callback="adPostCallback">
            @csrf
            <div id="ad-post-result"></div>
    
            <!-- Annonce -->
            <div class="fields-box clearfix">
                <h3>Votre annonce</h3>
                <div class="padd-b">
    
                    <div class="select-container">
                        <select name="product-is_offering" id="product-is_offering" required="required">
                            <option value="1" >Je propose</option>
                            <option value="0" >Je recherche</option>
                        </select>
                        @error('product-is_offering')
                              <div class="form-error">
                                     {{$message}}
                              </div>
                        @enderror
                    </div>
    
                    <div class="select-container">
                        <select name="product-type" required="required">
                            <option value="service" >Un service</option>
                            <option value="product" >Un bien</option>
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
                                                    <option value="{{ $subcategory->id }} @if(old('subcategory_id') == $subcategory->id ) selected @endif" >{{ $subcategory->name }}</option>
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


                <div class="padd-b" >
                    
                    <div class="select-container" id="start-field" style="display: @if(old('product-is_offering') === '0') block @else none @endif;">
                        <label for="">Date Debut</label><br>
                        <input type="date" class="rounded-lg" name="product-startDate" id="start_date" value="{{ old('product-startDate') }}" placeholder="start Date" class="inline-block width-100">
                        @error('product-price')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="select-container ml-12"  id="end-field" style="display: @if(old('product-is_offering') === '0') block @else none @endif;">
                        <label for="">Date Fin</label><br>
                        <input type="date" class="rounded-lg" name="product-endDate" id="end_Date" value="{{ old('product-endDate') }}" placeholder="end Date" class="inline-block width-100">
                        @error('product-price')
                        <div class="form-error">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>




                <div class="select-container padd-b">
                    <select name="ad_exchange_type" id="ad_exchange_type" required="required">
                        <option value="price" @if(old('ad_exchange_type') === 'price') selected @endif>Prix</option>
                        <option value="exchange" @if(old('ad_exchange_type') === 'exchange') selected @endif>échange contre</option>
                    </select>
                </div>
                
                <div class="padd-b" id="price-field" style="display: @if(old('ad_exchange_type') === 'price') block @else none @endif;">
                    <input type="number" name="product-price" id="ad_price" value="{{ old('product-price') }}" placeholder="Price" class="inline-block width-100">
                    @error('product-price')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="padd-b" id="exchange-field" style="display: @if(old('ad_exchange_type') === 'exchange') block @else none @endif;">
                    <input type="text" name="product-exchange_for" id="ad_exchange_for" value="{{ old('product-exchange_for') }}" placeholder="Exchange for" class="inline-block width-100">
                    @error('product-exchange_for')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
         

                <div class="padd-b ">
                    <input type="text" name="product-name" value="{{old('product-name')}}" placeholder="Nom du service ou du bien"
                           class="inline-block width-100 rounded-lg" maxlength="100" required="required"  />
                           @error('product-name')
                              <div class="form-error">
                                     {{$message}}
                              </div>
                           @enderror
                </div>
                <label>Description</label>
                <div class="padd-b relative">
                    <textarea name="product-description" value="{{old('product-description')}}" rows="4" class="width-100" maxlength="255" minlength="10" required="required"></textarea>
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
                    <input type="file" name="image" id="image" accept="image/*" />
                   
                </div>
                     
                
            </div>
    
            <!-- Localisation -->
           
            <!-- Identité -->
           
            <div class="text-center padd-t">
                <button type="submit" class="highlight" ><span>Publier</span></button>
            </div>
    
        </form>
    
        
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ad_exchange_type').change(function () {
            if ($(this).val() === 'price') {
                $('#price-field').show();
                $('#exchange-field').hide();
            } else if ($(this).val() === 'exchange') {
                $('#price-field').hide();
                $('#exchange-field').show();
            }
        });


        $('#product-is_offering').change(function () {
            if ($(this).val() === '0') {
                $('#start-field').show();
                $('#end-field').show();
            } else if ($(this).val() === '1') {
                $('#start-field').hide();
                $('#end-field').hide();
                
            }
        });

    });
</script>

@endsection