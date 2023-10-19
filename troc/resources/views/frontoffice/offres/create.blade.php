@extends('frontoffice.index')

@section('content')
    <section id="main" class="clearfix">
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <h1 class="text-center title-underline-center">Publier une annonce</h1>
        <div id="ad-publish" style="margin-left: 170px">


            <form action="{{ route('offres.store') }}" method="post" class="form width-80" enctype="multipart/form-data"
                data-ajax-callback="adPostCallback">
                @csrf
                <div id="ad-post-result"></div>

                <!-- Annonce -->
                <div class="fields-box clearfix">
                    <h3>Votre annonce</h3>
                    <div class="padd-b">




                        <div class="select-container">
                            <select name="offre-product_id" required="required">
                                <option value="{{ $product->id }}" class='bold bg-light large'>{{ $product->name }}
                                </option>

                            </select>
                            @error('offre-product_id')
                                <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>


                    <div class="padd-b">

                        <div class="select-container" id="start-field"
                            style="display: @if (old('offre-is_offering') === '0') block @else none @endif;">
                            <label for="">Date Debut</label><br>
                            <input type="date" class="rounded-lg" name="offre-startDate" id="start_date"
                                value="{{ old('offre-startDate') }}" placeholder="start Date"
                                class="inline-block width-100">
                            @error('offre-startDate')
                                <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="select-container ml-12" id="end-field"
                            style="display: @if (old('offre-is_offering') === '0') block @else none @endif;">
                            <label for="">Date Fin</label><br>
                            <input type="date" class="rounded-lg" name="offre-endDate" id="end_Date"
                                value="{{ old('offre-endDate') }}" placeholder="end Date" class="inline-block width-100">
                            @error('offre-endDate')
                                <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div class="padd-b" id="exchange-field">
                        <label for="offre-value">Value</label>
                        <input type="text" name="offre-value" id="ad_value" value="{{ old('offre-value') }}"
                            placeholder="Value" class="inline-block width-100">
                        @error('offre-value')
                            <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="padd-b ">
                        <label for="offre-name">Name</label>
                        <input type="text" name="offre-name" value="{{ old('offre-name') }}"
                            placeholder="Nom du service ou du bien" class="inline-block width-100 rounded-lg"
                            maxlength="100" />
                        @error('offre-name')
                            <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label>Description</label>
                    <div class="padd-b relative">

                        <textarea name="offre-description" value="{{ old('offre-description') }}" rows="4" class="width-100"></textarea>
                        @error('offre-description')
                            <div class="form-error bg-red-500 h-8 w-36 text-white rounded-md mt-1 pl-4">
                                {{ $message }}
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
                    <button type="submit" class="highlight"><span>Publier</span></button>
                </div>

            </form>


        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#ad_exchange_type').change(function() {
                if ($(this).val() === 'price') {
                    $('#price-field').show();
                    $('#exchange-field').hide();
                } else if ($(this).val() === 'exchange') {
                    $('#price-field').hide();
                    $('#exchange-field').show();
                }
            });


            $('#product-is_offering').change(function() {
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
