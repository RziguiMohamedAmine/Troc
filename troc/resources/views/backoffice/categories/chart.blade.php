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
                    <h4 class="page-title">Flot Chart</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">charts</a></li>
                        <li class="breadcrumb-item active">Flot Chart</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Pie Chart</h4>
                            <p class="sub-title d-inline-block text-truncate w-100">Pie chart is used to see the proprotion
                                of each data groups, making Flot pie chart is pretty simple, in order to
                                make pie chart you have to incldue jquery.flot.pie.js plugin.</p>

                            <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                                <li class="list-inline-item">
                                    <h5>3654</h5>
                                    <p class="text-muted">Marketplace</p>
                                </li>
                                <li class="list-inline-item">
                                    <h5>954</h5>
                                    <p class="text-muted">Last week</p>
                                </li>
                                <li class="list-inline-item">
                                    <h5>8462</h5>
                                    <p class="text-muted">Last Month</p>
                                </li>
                            </ul>

                            <div  id="pie-chart">
                                <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->              
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->

    </div>
    </div>
    <!-- content -->



<script src="{{asset('assets/backoffice/js/app.js')}}"></script>
<script src="{{asset('assets/backoffice/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/backoffice/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backoffice/js/metismenu.min.js')}}"></script>
<script src="{{asset('assets/backoffice/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('assets/backoffice/js/waves.min.js')}}"></script>
<!-- flot chart js -->
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.time.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.selection.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.stack.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/curvedLines.js')}}"></script>
<script src="{{asset('assets/backoffice/plugins/flot-chart/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('assets/backoffice/pages/flot.init.js')}}"></script>     
   


@endsection