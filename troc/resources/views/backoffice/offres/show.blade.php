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
                        <h5 class="text-muted">{{ $offre->description }}</h5>
                    </div>
                </div>
            </div>
            <div class="row m-t-30" style="margin-left:8rem;">
                <div class="col-xl-11 col-md-6">
                    <div class="card pricing-box mt-4">
                        <div class="pricing-icon " style="margin-left: 24rem;">
                            @if ($offre->image)
                                <img src="{{ asset('images/' . $offre->image) }}" alt="{{ $offre->image }}"
                                    style="width: 150px; height: 150px;" class="" />
                            @else
                                <div
                                    style="width: 150px;
                                            height: 150px;
                                            border-radius: 50%;
                                            background-color: #2196F3;
                                            color: #ffffff;
                                            font-size: 24px;
                                            text-align: center;
                                            line-height: 140px;">
                                    {{ $offre->name }}
                                </div>
                            @endif
                        </div>
                        <div class="pricing-content">
                            <div class="text-center">
                                <h5 class="text-uppercase mt-5">{{ $offre->value }}</h5>

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
    <script></script>
@endsection
