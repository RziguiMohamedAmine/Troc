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
                                    <th>Catgory</th>
                                    <th data-priority="3">Modifier</th>
                                    <th data-priority="6">Supprimer</th>
                                    
                                </tr>

                                </thead>
                                <tbody>
                                    @if(count($subcategories) > 0)
                                    @foreach ($subcategories as $subcategorie)
                                <tr>                                  
                                    <td>{{ $subcategorie->id }}</td>
                                    <td>{{ $subcategorie->name }}</td>        
                                    <td>{{ $subcategorie->category->name }}</td>  

                                    <td><a href="{{route('subcategories.edit',$subcategorie->id)}}" class="btn btn-tbl-edit"><i class="fa fa-edit" style="font-size:30px;color:rgb(15, 192, 15)"></i></a></td>


                                    <td><a href="{{ route('subcategories.destroy', $subcategorie->id) }}"
                                        onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this category?')) document.getElementById('delete-category-form').submit();">
                                        <i class="fa fa-trash" style="font-size: 30px; color: red;"></i>
                                     </a>
                                     
                                     <form id="delete-category-form" action="{{ route('subcategories.destroy', $subcategorie->id) }}" method="POST" style="display: none;">
                                         @csrf
                                         @method('DELETE')
                                     </form></td>                                
                                </tr>
                                @endforeach
                                @else
                                <tr><p>No subcategories found {{--for {{ $categorie->name }}--}}</p></tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>                                
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