@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('assets/backoffice/plugins/sweet-alert2/sweetalert2.css')}}" rel="stylesheet" type="text/css">

      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Liste des Categories</h4>
                    </div>
                   
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Categories</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Liste</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="mt-0 header-title">Examples</h4>
                                    <p class="sub-title">just start typing to edit, or move around with arrow keys or mouse clicks!</p>
                                </div>
                                <div id="chart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pie Chart</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <!-- List of data points for the pie chart -->
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
                                            <div class="modal-body">
                                                <!-- Placeholder for the pie chart -->
                                                <div id="pie-chart-container" class="flot-chart" style="height: 320px;"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="" style="margin-left: 34em;margin-bottom: 1em;">
                                     <button type="button" class="btn btn-primary waves-effect waves-light" id="custom-padding-width-alert">Statistiques</button>
                                </div>
                            </div>
                            
                            <table id="mainTable" class="table table-striped mb-0 table-editable">
                                <thead>                         
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Sub-Categories</th>
                                    <th data-priority="3">Modifier</th>
                                    <th data-priority="6">Supprimer</th>
                                    
                                </tr>

                                </thead>
                                <tbody>
                                    @if(count($categories)>0)
                                    @foreach ($categories as $categorie)
                                <tr>                                  
                                    <td>{{ $categorie->id }}</td>

                                   {{-- <td> <a href="#" id="inline-username" class="xedit" data-type="text" data-pk="{{ $categorie->id }}" data-url="{{ route('categories.update-name', $categorie->id) }}" data-title="Enter category name">{{ $categorie->name }}</a></td>  --}}
                                   <td>{{ $categorie->name }}</td>
                                 
                                    
                                    <td>{{ $categorie->description }}</td>  
                                    <td>
                                        <a href="{{ route('subcategories.index', ['categorie' => $categorie->id]) }}" class="btn btn-primary">Subcategories</a>
                                    </td>

                                    <td><a href="{{route('categories.edit',$categorie->id)}}" class="btn btn-tbl-edit"><i class="fa fa-edit" style="font-size:30px;color:rgb(15, 192, 15)"></i></a></td>


                                    <td><a href="{{ route('categories.destroy', $categorie->id) }}"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category?')) document.getElementById('delete-category-form').submit();">
                                        <i class="fa fa-trash" style="font-size: 30px; color: red;"></i>
                                     </a>
                                     
                                     <form id="delete-category-form" action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display: none;">
                                         @csrf
                                         @method('DELETE')
                                     </form></td>                                
                                </tr>
                                @endforeach
                                @else
                                <tr>no product found</tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    {{-- <th><strong>TOTAL</strong></th> --}}
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->      

            
        </div>
        <!-- container-fluid -->

    </div>
    <script src="http://cdn.jsdelivr.net/jquery.flot/0.8.3/jquery.flot.min.js"></script>
    <!-- content -->
    <script src="{{asset('assets/backoffice/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backoffice/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backoffice/js/metismenu.min.js')}}"></script>
    <script src="{{asset('assets/backoffice/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/backoffice/js/waves.min.js')}}"></script>
    <script src="{{asset('assets/backoffice/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    {{-- <script src="{{asset('assets/backoffice//pages/sweet-alert.init.js')}}"></script>  --}}
    <script src="{{asset('assets/backoffice/js/app.js')}}"></script>

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







    <script>



    $(document).ready(function () {
        
    // Custom width padding
    $('#custom-padding-width-alert').click(function () {
        // Display the modal
        $('#chart-modal').modal('show');

        // Generate and display the pie chart
        $.plot('#pie-chart-container', [{
            label: 'Marketplace',
            data: 3654,
        }, {
            label: 'Last week',
            data: 954,
        }, {
            label: 'Last Month',
            data: 8462,
        }], {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: function (label, series) {
                            return '<div style="font-size:8pt;text-align:center;padding:2px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
                        },
                        background: {
                            opacity: 0.5,
                            color: '#000'
                        }
                    }
                }
            },
            legend: {
                show: true,
                position: 'ne',
                noColumns: 0,
                labelBoxBorderColor: null,
                labelFormatter: function (label, series) {
                    return '<div style="padding:5px;font-size:12pt;">' + label + '</div>';
                },
                width: 200,
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    });

    // Flot chart initialization
    var FlotChart = function() {
        this.$body = $("body");
        this.$realData = [];
    };

    FlotChart.prototype.createPieGraph = function(selector, labels, datas, colors) {
        var data = [{
            label: labels[0],
            data: datas[0]
        }, {
            label: labels[1],
            data: datas[1]
        }, {
            label: labels[2],
            data: datas[2]
        }];
        var options = {
            series: {
                pie: {
                    show: true
                }
            },
            legend: {
                show: true
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            colors: colors,
            tooltip: true,
            tooltipOpts: {
                content: "%s, %p.0%"
            }
        };

        $.plot($(selector), data, options);
    };

    FlotChart.prototype.init = function() {
        // Pie graph data
        var pielabels = ["Marketplace", "Other Market", "Direct Sales"];
        var datas = [30, 25, 30];
        var colors = ['#30419b', '#02c58d', "#f0f4f7"];
        this.createPieGraph("#pie-chart #pie-chart-container", pielabels, datas, colors);
    };

    $.FlotChart = new FlotChart();
    $.FlotChart.Constructor = FlotChart;



});

    </script>
   
@endsection