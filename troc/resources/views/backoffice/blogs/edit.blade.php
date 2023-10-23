@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Update blogs</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">blogs</a></li>                         
                            <li class="breadcrumb-item active">Update blog</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">blogs</h4>
                            <p class="sub-title">   
                                        <code class="highlighter-rouge">  </code>  
                                        <code class="highlighter-rouge"> </code> 
                                        <code class="highlighter-rouge"> </code>  
                            </p>

                                    <form class="" action="{{route('blogs.updateback',['blog' => $blog->id ])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>title</label>
                                            <input id="blog-title" type="string" value="{{$blog->title}}" class="form-control" required name="blog-title"/>
                                            @error('blog-title')
                                              <div class="form-error">
                                                   {{$message}}
                                             </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>content</label>
                                            <input id="blog-content" value="{{$blog->content}}" type="text" class="form-control" required name="blog-content"/>
                                            @error('blog-content')
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
                                                <button type="reset" class="btn btn-secondary waves-effect m-l-5" onclick="cancelButtonClicked()">
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
    <script>
    function cancelButtonClicked() {
        window.location.href = '{{ route('blogs.index') }}';
    }
</script>


@endsection