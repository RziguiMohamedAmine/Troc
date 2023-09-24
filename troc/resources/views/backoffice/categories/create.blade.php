@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Add Categories</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Categories</a></li>                         
                            <li class="breadcrumb-item active">Add Categorie</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Categories</h4>
                            <p class="sub-title">   
                                        <code class="highlighter-rouge">  </code>  
                                        <code class="highlighter-rouge"> </code> 
                                        <code class="highlighter-rouge"> </code>  
                            </p>

                                    <form class="" action="{{route('categories.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="categorie-name" type="text" value="{{old('categorie-name')}}" class="form-control" required placeholder="Name" name="categorie-name"/>
                                            @error('categorie-name')
                                              <div class="form-error">
                                                   {{$message}}
                                             </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input id="categorie-description" value="{{old('categorie-description')}}" type="text" class="form-control" required placeholder="Description" name="categorie-description"/>
                                            @error('categorie-name')
                                              <div class="form-error">
                                                   {{$message}}
                                             </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <select id="categorie-icon" class="form-control" required value="{{old('categorie-icon')}}"name="categorie-icon">                                             
                                               <option value="lni-hand" data-icon="lni-hand">✋ Hand</option>
                                               <option value="lni-emoji-smile" data-icon="lni-emoji-smile">😄 Emoji Smile</option>
                                               <option value="lni-paint-roller" data-icon="lni-paint-roller">🖌️ Paint Roller</option>
                                               <option value="lni-graduation" data-icon="lni-graduation">🎓 Graduation</option>
                                               <option value="lni-basketball" data-icon="lni-basketball">🏀 Basketball</option>
                                               <option value="lni-home" data-icon="lni-home">🏠 Home</option>
                                               <option value="lni-tshirt" data-icon="lni-tshirt">👕 T-Shirt</option>
                                               <option value="lni-briefcase" data-icon="lni-briefcase">💼 Briefcase</option>
                                               <option value="lni-car" data-icon="lni-car">🚗 Car</option> 
                                            </select>
                                            @error('categorie-icon')
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