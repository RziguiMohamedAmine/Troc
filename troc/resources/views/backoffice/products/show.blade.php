@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">


      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Details</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Produits</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Details</a></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <h5>Description</h5>
                        <h5 class="text-muted">{{ $product->description}}</h5>
                    </div>
                </div>
            </div>
                            <div class="row m-t-30" style="margin-left:8rem;" >
                                <div class="col-xl-11 col-md-6">
                                    <div class="card pricing-box mt-4">
                                        <div class="pricing-icon " style="margin-left: 24rem;">
                                            @if ($product->image)
                                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}" 
                                                style="width: 150px; height: 150px;" class="" />  
                                            @else
                                            <div style="width: 150px; 
                                            height: 150px;
                                            border-radius: 50%;
                                            background-color: #2196F3; 
                                            color: #ffffff; 
                                            font-size: 24px; 
                                            text-align: center;
                                            line-height: 140px;"> 
                                                {{ $product->name }}
                                            </div>
                                            
                                            @endif
                                        </div>
                                        <div class="pricing-content">
                                            <div class="text-center">
                                                <h5 class="text-uppercase mt-5">{{ $product->name }}</h5>
                                                <div class="pricing-plan mt-4 pt-2">
                                                    <h1><sup>DT </sup>{{ $product->price }}</h1>
                                                </div>
                                                <div class="pricing-border mt-5"></div>
                                            </div>
                                            <div class="pricing-features mt-4">
                                             <p class="font-14 mb-2">
                                                @if (!$product->is_offering)
                                                <i class="ti-check-box text-success mr-3"></i>Je cherche : {{ $product->name }}
                                            @else
                                            <i class="ti-check-box text-success mr-3"></i>Je propose : {{ $product->name }}
                                            @endif 
                                            </p>

                                            <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i> Utilisateur : {{ $product->user->name }}</p>
                                             <p class="font-14 mb-2">
                                                @if ($product->exchange_for)
                                                <i class="ti-check-box text-success mr-3"></i> Echange contre : {{ $product->exchange_for }}
                                            @else
                                            <i class="ti-check-box text-success mr-3"></i> Prix : {{ $product->price }}</span><strong class="font-bold"> DT</strong>
                                            @endif
                                             </p>
                                             <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i> SubCategory : {{ $product->subcategory->name }} </p>
                                             <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i> Category : 
                                                {{ $product->subcategory->category->name }}</p>
                                             <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i> Date de publication : {{$product->created_at->format('Y-m-d')}} </p><br>

                                             
                                             @if ($product->start_date && $product->end_date)                 
                                                <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i>Date de Debut : {{ $product->start_date }}</p>
                                                <p class="font-14 mb-2"><i class="ti-check-box text-success mr-3"></i>  Date de fin :  {{ $product->end_date }}</p>
                                            @endif
                                            
                                            </div>
                                            <div class="pricing-border mt-4"></div>
                                            <div class="mt-4 pt-3 text-center">
                                                <a href="" class="btn btn-success btn-lg w-100 btn-round">Archiver la publication</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->      

            
        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
<script>

</script>

@endsection