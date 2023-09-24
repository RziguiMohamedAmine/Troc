@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Add Sub-Categories</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Sub-Categories</a></li>                         
                            <li class="breadcrumb-item active">Add Sub-Categorie</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Sub-Categories</h4>
                            <p class="sub-title">   
                                        <code class="highlighter-rouge">  </code>  
                                        <code class="highlighter-rouge"> </code> 
                                        <code class="highlighter-rouge"> </code>  
                            </p>

                                    <form class="" action="{{route('subcategories.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="subcategorie-name" type="text" value="{{old('subcategorie-name')}}" class="form-control" required placeholder="Name" name="subcategorie-name"/>
                                            @error('subcategorie-name')
                                              <div class="form-error">
                                                   {{$message}}
                                             </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select id="subcategorie-category_id" class="form-control" required name="subcategorie-category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategorie-category_id')
                                              <div class="form-error">
                                                   {{$message}}
                                             </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                       
                           
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->      

            
        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->



@endsection