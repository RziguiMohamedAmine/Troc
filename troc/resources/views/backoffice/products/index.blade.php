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
                        <h4 class="page-title">Table Editable</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Table Editable</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Examples</h4>
                            <p class="sub-title">just start typing to edit, or move around with arrow keys or mouse clicks!</p>

                            <table id="mainTable" class="table table-striped mb-0 table-editable">
                                <thead>                         
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>                                                                      
                                    <th>Sub-Categories</th>
                                    <th data-priority="6">User</th>
                                    <th data-priority="6">Details</th>
                                    
                                </tr>

                                </thead>
                                <tbody>
                                 
                                    @foreach ($products as $product)
                                    @php
                                             $today = \Carbon\Carbon::today(); 
                                             $endDate = \Carbon\Carbon::parse($product->end_date); 
                                    @endphp  
                                    @if ($endDate->greaterThanOrEqualTo($today))         
                                    <tr>
                                       
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td> 
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>
                                            <a href="{{ route('backoffice.products.show',['product'=> $product['id']]) }}"
                                                class="btn btn-primary">Details</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                             
                              
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
    <!-- content -->
<script>

</script>

@endsection