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
                                    <th>offer / propose</th>
                                    <th>Price / Echange for</th>
                                    <th>Sub-Categories</th>
                                    <th data-priority="3">Category</th>
                                    <th data-priority="6">User</th>
                                    <th data-priority="6">Date Publication</th>

                                </tr>

                                </thead>
                                <tbody>

                                    @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->image }}"
                                                style="width: 40px; height: 40px;" class="rounded-circle" />
                                            @else
                                            <div style="width: 40px;
                                            height: 40px;
                                            border-radius: 50%;
                                            background-color: #2196F3;
                                            color: #ffffff;
                                            font-size: 10px;
                                            text-align: center;
                                            line-height: 40px;">
                                                {{ strtoupper(substr($product->name, 0, 3)) }}
                                            </div>

                                            @endif

                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>

                                                @if (!$product->is_offering)
                                                    <strong>Je cherche :</strong><span class="text-color1"> {{ $product->name }}</span><br>
                                                @else
                                                    <strong>Je propose :</strong><span class="text-color1"> {{ $product->name }}</span><br>
                                                @endif

                                          </td>
                                          <td>
                                            @if ($product->exchange_for)
                                                <strong>Echange contre :</strong><span class="text-color1"> {{ $product->exchange_for }}</span><br>
                                            @else
                                                <strong>Prix :</strong><span class="text-color1"> {{ $product->price }}</span><strong class="font-bold"> DT</strong>
                                            @endif
                                        </td>
                                        <td>{{ $product->subcategory->name }}</td>
                                        <td>{{ $product->subcategory->category->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{$product->created_at->format('Y-m-d')}}</td>
                                    </tr>
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
