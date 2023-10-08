@extends('backoffice.index')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/backoffice/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    <style>
        .modal.show {
            z-index: 1041 !important;
        }
    </style>
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
                                    <p class="sub-title">just start typing to edit, or move around with arrow keys or mouse
                                        clicks!</p>
                                </div>

                                <div id="chart-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" style="display: block; z-index:-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Pie Chart</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                            <div class="modal-body" style="display: block">
                                                <!-- Placeholder for the pie chart -->

                                                <div id="pie-chart" style="width:100%">
                                                    <div id="pie-chart-container" class="flot-chart" style="height: 320px">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="" style="margin-left: 34em;margin-bottom: 1em;">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                        id="custom-padding-width-alert">Statistiques</button>
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
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <td>{{ $categorie->id }}</td>

                                                {{-- <td> <a href="#" id="inline-username" class="xedit" data-type="text" data-pk="{{ $categorie->id }}" data-url="{{ route('categories.update-name', $categorie->id) }}" data-title="Enter category name">{{ $categorie->name }}</a></td>  --}}
                                                <td>{{ $categorie->name }}</td>


                                                <td>{{ $categorie->description }}</td>
                                                <td>
                                                    <a href="{{ route('subcategories.index', ['categorie' => $categorie->id]) }}"
                                                        class="btn btn-primary">Subcategories</a>
                                                </td>

                                                <td><a href="{{ route('categories.edit', $categorie->id) }}"
                                                        class="btn btn-tbl-edit"><i class="fa fa-edit"
                                                            style="font-size:30px;color:rgb(15, 192, 15)"></i></a></td>


                                                <td><a href="{{ route('categories.destroy', $categorie->id) }}"
                                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category?')) document.getElementById('delete-category-form').submit();">
                                                        <i class="fa fa-trash" style="font-size: 30px; color: red;"></i>
                                                    </a>

                                                    <form id="delete-category-form"
                                                        action="{{ route('categories.destroy', $categorie->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            // Custom width padding
            $('#custom-padding-width-alert').click(function() {
                $('#chart-modal').modal('show');
            })
        })
    </script>
    <!-- content -->
    <script src="{{ asset('assets/backoffice/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/backoffice/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{asset('assets/backoffice//pages/sweet-alert.init.js')}}"></script>  --}}
    <script src="{{ asset('assets/backoffice/js/app.js') }}"></script>

    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/curvedLines.js') }}"></script>
    <script src="{{ asset('assets/backoffice/plugins/flot-chart/jquery.flot.crosshair.js') }}"></script>
    {{-- <script src="{{ asset('assets/backoffice/pages/flot.init.js') }}"></script> --}}
    <script>
        /*
             Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
             Author: Themesdesign
             Website: www.themesdesign.in
             File: Float Js
             */


        ! function($) {
            "use strict";

            var FlotChart = function() {
                this.$body = $("body")
                this.$realData = []
            };

            //creates plot graph
            FlotChart.prototype.createPlotGraph = function(selector, data1, data2, labels, colors, borderColor, bgColor) {
                    //shows tooltip
                    function showTooltip(x, y, contents) {
                        $('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
                            position: 'absolute',
                            top: y + 5,
                            left: x + 5
                        }).appendTo("body").fadeIn(200);
                    }

                    $.plot($(selector),
                        [{
                                data: data1,
                                label: labels[0],
                                color: colors[0]
                            },
                            {
                                data: data2,
                                label: labels[1],
                                color: colors[1]
                            }
                        ], {
                            series: {
                                lines: {
                                    show: true,
                                    fill: true,
                                    lineWidth: 2,
                                    fillColor: {
                                        colors: [{
                                                opacity: 0.5
                                            },
                                            {
                                                opacity: 0.5
                                            }
                                        ]
                                    }
                                },
                                points: {
                                    show: false
                                },
                                shadowSize: 0
                            },
                            legend: {
                                position: 'nw'
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                borderColor: borderColor,
                                borderWidth: 1,
                                labelMargin: 10,
                                backgroundColor: bgColor
                            },
                            yaxis: {
                                min: 0,
                                max: 15,
                                color: 'rgba(165, 166, 173, 0.1)'
                            },
                            xaxis: {
                                color: 'rgba(165, 166, 173, 0.1)'
                            },
                            tooltip: true,
                            tooltipOpts: {
                                content: '%s: Value of %x is %y',
                                shifts: {
                                    x: -60,
                                    y: 25
                                },
                                defaultTheme: false
                            }
                        });
                },
                //end plot graph

                //creates Pie Chart
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
                },

                //returns some random data
                FlotChart.prototype.randomData = function() {
                    var totalPoints = 300;
                    if (this.$realData.length > 0)
                        this.$realData = this.$realData.slice(1);

                    // Do a random walk
                    while (this.$realData.length < totalPoints) {

                        var prev = this.$realData.length > 0 ? this.$realData[this.$realData.length - 1] : 50,
                            y = prev + Math.random() * 10 - 5;

                        if (y < 0) {
                            y = 0;
                        } else if (y > 100) {
                            y = 100;
                        }

                        this.$realData.push(y);
                    }

                    // Zip the generated y values with the x values
                    var res = [];
                    for (var i = 0; i < this.$realData.length; ++i) {
                        res.push([i, this.$realData[i]])
                    }

                    return res;
                },

                FlotChart.prototype.createRealTimeGraph = function(selector, data, colors) {
                    var plot = $.plot(selector, [data], {
                        colors: colors,
                        series: {
                            lines: {
                                show: true,
                                fill: true,
                                lineWidth: 2,
                                fillColor: {
                                    colors: [{
                                        opacity: 0.45
                                    }, {
                                        opacity: 0.45
                                    }]
                                }
                            },
                            points: {
                                show: false
                            },
                            shadowSize: 0
                        },
                        grid: {
                            show: true,
                            aboveData: false,
                            color: '#dcdcdc',
                            labelMargin: 15,
                            axisMargin: 0,
                            borderWidth: 0,
                            borderColor: null,
                            minBorderMargin: 5,
                            clickable: true,
                            hoverable: true,
                            autoHighlight: false,
                            mouseActiveRadius: 20
                        },
                        tooltip: true, //activate tooltip
                        tooltipOpts: {
                            content: "Value is : %y.0" + "%",
                            shifts: {
                                x: -30,
                                y: -50
                            }
                        },
                        yaxis: {
                            min: 0,
                            max: 100,
                            color: 'rgba(165, 166, 173, 0.1)'
                        },
                        xaxis: {
                            show: false
                        }
                    });

                    return plot;
                },
                //creates Pie Chart
                FlotChart.prototype.createDonutGraph = function(selector, labels, datas, colors) {
                    var data = [{
                            label: labels[0],
                            data: datas[0]
                        }, {
                            label: labels[1],
                            data: datas[1]
                        }, {
                            label: labels[2],
                            data: datas[2]
                        },
                        {
                            label: labels[3],
                            data: datas[3]
                        }, {
                            label: labels[4],
                            data: datas[4]
                        }
                    ];
                    var options = {
                        series: {
                            pie: {
                                show: true,
                                innerRadius: 0.7
                            }
                        },
                        legend: {
                            show: true,
                            labelFormatter: function(label, series) {
                                return '<div style="font-size:14px;">&nbsp;' + label + '</div>'
                            },
                            labelBoxBorderColor: null,
                            margin: 50,
                            width: 20,
                            padding: 1
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
                },

                //initializing various charts and components
                FlotChart.prototype.init = function() {
                    // //plot graph data
                    // var uploads = [[0, 12], [1, 8], [2, 5], [3, 8], [4, 5], [5, 14], [6, 10]];
                    // var downloads = [[0, 1], [1, 12], [2,4], [3, 3], [4, 12], [5, 4], [6, 12]];
                    // var plabels = ["Marketplace","Other Market"];
                    // var pcolors = ['#02c58d', '#30419b'];
                    // var borderColor = '#222437';
                    // var bgColor = '#222437';
                    // this.createPlotGraph("#website-stats", uploads, downloads, plabels, pcolors, borderColor, bgColor);

                    //Pie graph data
                    var pielabels = ["Marketplace", "Other Market", "Direct Sales"];
                    var datas = [30, 25, 30];
                    var colors = ['#30419b', '#02c58d', "#f0f4f7"];
                    this.createPieGraph("#pie-chart #pie-chart-container", pielabels, datas, colors);

                    //real time data representation
                    var plot = this.createRealTimeGraph('#flotRealTime', this.randomData(), ['#02c58d']);
                    plot.draw();
                    var $this = this;

                    function updatePlot() {
                        plot.setData([$this.randomData()]);
                        // Since the axes don't change, we don't need to call plot.setupGrid()
                        plot.draw();
                        setTimeout(updatePlot, $('html').hasClass('mobile-device') ? 1000 : 1000);
                    }
                    updatePlot();

                    //Donut pie graph data
                    var donutlabels = ["Marketplace", "Other Market", "Direct Sales"];
                    var donutdatas = [36, 21, 28];
                    var donutcolors = ['#02c58d', '#30419b', "#f0f4f7"];
                    this.createDonutGraph("#donut-chart #donut-chart-container", donutlabels, donutdatas, donutcolors);
                },

                //init flotchart
                $.FlotChart = new FlotChart, $.FlotChart.Constructor = FlotChart

        }(window.jQuery),

        //initializing flotchart
        function($) {
            "use strict";
            $.FlotChart.init()
        }(window.jQuery);
    </script>





@endsection
