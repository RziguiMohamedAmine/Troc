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
    <!-- content -->
<script>

</script>

@endsection